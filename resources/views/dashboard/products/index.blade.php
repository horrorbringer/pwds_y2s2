@extends('layout.mian_dashboard')
@section('contents')


<!-- Modal toggle and Search (inline) -->
<div class="flex flex-col sm:flex-row items-center justify-between gap-2 mb-3">
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Toggle modal
    </button>
    <form class="flex items-center gap-2 w-full sm:w-auto" action="{{route('products.index')}}" method="get">
        @csrf
        <input type="text"
                 name="search"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full sm:w-48 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
            placeholder="Search products..." />
        <input type="submit" value="Search"
            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800 cursor-pointer">
    </form>
</div>
<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Product
                </h3>
                <button type="button" id="btn_close_add" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <form class="p-4 md:p-5" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="pro_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="text" name="pro_name" id="pro_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required>
                        @error('pro_name')
                            <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>

                    <div id="" class="col-span-2 sm:col-span-1">
                        <img src="" id="displayImage" alt="" class="w-40 h-40 object-cover rounded-lg drop-shadow-lg">
                    </div>

                    <div class="flex items-center justify-center col-span-2 sm:col-span-1 w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                {{-- <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p> --}}
                            </div>
                            <input id="dropzone-file" type="file" name="image" class="hidden" onchange="preview(event)"/>
                        </label>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="pro_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="text" name="pro_price" id="pro_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$00" required min="0">
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
                        <input type="text" name="pro_quantity" id="pro_quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="000" required min="0">
                        @error('pro_quantity')
                            <p class="text-red-500">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="pro_discount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Discount</label>
                        <input type="text" name="pro_discount" id="pro_discount" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="00.00" required min="0">
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
        </div>
    </div>
</div>

	<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product ID
                    </th>
                    <th>
                        Product Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$product->id}}
                        </th>
                        <td>
                            <img width="90" src="{{asset('storage/'.$product->image)}}" alt="Product">
                        </td>
                        <td class="px-6 py-4">
                            {{$product->pro_name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$product->pro_price}}
                        </td>
                        <td class="px-6 py-4">
                            {{$product->pro_quantity}}
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <a href="{{route('products.edit',$product)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form onsubmit="confirmDelete(event)" action="{{route('products.destroy',$product)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>
<script>
    function preview(event) {
        const image = document.getElementById('displayImage');
        const file = event.target.files[0];
        image.src = URL.createObjectURL(file);

    }
    function confirmDelete(event) {
        event.preventDefault(); // Prevent the default form submission
        const form = event.target; // Get the form element

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit the form if confirmed
            }
        });
    }
</script>
@endsection

@push('sweet-alert')
	@if (session('success'))
        <script>
            showMsgSuccessToasts("{{session('success')}}");
        </script>
    @endif
@endpush
