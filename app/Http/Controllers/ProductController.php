<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){

            $s = trim($request->input('search'));

            $products = Product::where('pro_name','like','%'.$s.'%')
                                ->orWhere('pro_price','like','%'.$s.'%')
                                ->orWhere('pro_quantity','like','%'.$s.'%')
                                ->orWhere('pro_discount','like','%'.$s.'%')
                                ->orWhere('category_id','like','%'.$s.'%')
                               ->orderByDesc('id')
                               ->paginate(5);

        }else{

            $products = Product::orderByDesc('id')->paginate(5);

        }

        return view('dashboard.products.index',compact('products'));

        $products = Product::orderByDesc('id')->paginate(5);

        return view('dashboard.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {

        $products = $request->validated();


        if($request->hasFile('image')){

            $image = $request->file('image');

            $ext = $image->extension();

            $image_name = date('Y-m-d').'-'.time(). '-' .$products['pro_name'] .'.'.$ext;

            $path = Storage::disk('public')->putFileAs('products',$image,$image_name);

            $products['image'] = $path;
        }

        Product::create($products);

        session()->flash('success','The product created success.');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id ,Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(Product $product)
    {
        return view('dashboard.products.edit',compact('product'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $products = $request->validated();

        $path = $product->image;

        if($request->hasFile('image')){

            if($path){

                Storage::disk('public')->delete($path);

            }

            $image = $request->file('image');

            $ext = $image->extension();

            $image_name = date('Y-m-d').'-'.time(). '-' .$products['pro_name'] .'.'.$ext;

            $path = Storage::disk('public')->putFileAs('products',$image,$image_name);

            $products['image'] = $path;
        }

        $product->update($products);

        session()->flash('success','The product updated success.');

        return redirect()->route('products.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        session()->flash('success','The product deleted success.');
        return redirect()->route('products.index');
    }
}
