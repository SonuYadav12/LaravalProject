@extends('admin.index')

@section('admin-content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-blue-500 text-white p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
        <h2 class="text-2xl font-bold">Total Users</h2>
        <p class="text-4xl">{{ $totalUsers }}</p>
    </div>
    <div class="bg-green-500 text-white p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
        <h2 class="text-2xl font-bold">Total Orders</h2>
        <p class="text-4xl">{{ $totalOrders }}</p>
    </div>
    <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
        <h2 class="text-2xl font-bold">Total Products</h2>
        <p class="text-4xl">{{ $totalProducts }}</p>
    </div>
    <div class="bg-purple-500 text-white p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl">
        <h2 class="text-2xl font-bold">Total Categories</h2>
        <p class="text-4xl">{{ $totalCategories }}</p>
    </div>
</div>
@endsection
