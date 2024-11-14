@extends('admin.index')

@section('admin-content')
<h1 class="text-3xl font-bold mb-6">Product Management</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
        {{ session('error') }}
    </div>
@endif

<!-- Add Product Button -->
<div class="mb-6">
    <a href="{{ route('admin.products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Add New Product</a>
</div>

<!-- Products List -->
<div class="overflow-x-auto">
    <div class="max-h-96 overflow-y-auto">
        <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
            <thead class="bg-gray-200 sticky top-0">
                <tr>
                    <th class="py-4 px-6 text-left font-semibold text-gray-700">ID</th>
                    <th class="py-4 px-6 text-left font-semibold text-gray-700">Image</th>
                    <th class="py-4 px-6 text-left font-semibold text-gray-700">Name</th>
                    <th class="py-4 px-6 text-left font-semibold text-gray-700">Category</th>
                    <th class="py-4 px-6 text-left font-semibold text-gray-700">Price</th>
                    <th class="py-4 px-6 text-left font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="border-b hover:bg-gray-100 transition duration-300 {{ $loop->even ? 'bg-gray-50' : '' }}">
                        <td class="py-4 px-6">{{ $product->id }}</td>
                        <td class="py-4 px-6">
                            @if($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover rounded">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td class="py-4 px-6">{{ $product->name }}</td>
                        <td class="py-4 px-6">{{ $product->category->name }}</td>
                        <td class="py-4 px-6">${{ number_format($product->price, 2) }}</td>
                        <td class="py-4 px-6">
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
