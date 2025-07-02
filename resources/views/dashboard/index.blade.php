@extends('layout.mian_dashboard')
@section('contents')
 
<h1>Dashbaord</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
   <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Total Products</h3>
      <p class="mt-2 text-3xl font-bold text-blue-500">120</p>
   </div>
   <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Total Users</h3>
      <p class="mt-2 text-3xl font-bold text-green-500">45</p>
   </div>
   <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Orders</h3>
      <p class="mt-2 text-3xl font-bold text-yellow-500">30</p>
   </div>
   <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Revenue</h3>
      <p class="mt-2 text-3xl font-bold text-red-500">$5,000</p>
   </div>
</div>
@endsection