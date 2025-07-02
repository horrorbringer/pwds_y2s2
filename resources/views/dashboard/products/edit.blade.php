@extends('layout.mian_dashboard')
@section('contents')

    <form class="p-4 md:p-5" method="POST" action="{{route('products.update',$product)}}" enctype="multipart/form-data">
        @method('PUT')        
        @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 ">
                        <label for="pro_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="text" value="{{$product->pro_name}}" name="pro_name" id="pro_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required>
                        @error('pro_name')
                            <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <img id="displayImage" src="{{asset('storage/'.$product->image)}}" alt="Product Image" class="w-40 h-40 object-cover rounded-lg drop-shadow-lg" />
                    </div>
 
                    <div class="flex items-center justify-center col-span-2 w-full sm:col-span-1">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" name="image" onchange="preview(event)" class="hidden" />
                        </label>
                    </div> 


                    <div class="col-span-2 sm:col-span-1">
                        <label for="pro_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="text" name="pro_price" value="{{$product->pro_price}}" id="pro_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$00" required min="0">
                        @error('pro_price')
                            <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>


                    <div class="col-span-2 sm:col-span-1">
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Select category</option>
                            <option value="1">TV/Monitors</option>
                            <option value="2">PC</option>
                        </select>
                        @error('category_id')
                            <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="pro_quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                        <input type="text" name="pro_quantity" value="{{$product->pro_quantity}}" id="pro_quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="000" required min="0">
                        @error('pro_quantity')
                            <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="pro_discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
                        <input type="text" name="pro_discount" value="{{$product->pro_discount}}" id="pro_discount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="00.00" required min="0">
                        @error('pro_discount')
                            <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" id="btn_save" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Add new product
                </button>
            </form>
@endsection
<script>
    function preview(e){
        const image = document.getElementById('displayImage');
        image.src = URL.createObjectURL(e.target.files[0]);
    }
</script>