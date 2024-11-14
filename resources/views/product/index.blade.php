@extends('layouts.app')

@section('title', 'FurniStyle | Shop')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-10">Shop</h1>
    <p class="text-center mt-4 mb-10">Browse our collection of furniture.</p>

    <div class="container mx-auto" x-data="{ selectedCategory: null }">
        <!-- Filter Section -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Categories</h2>
            <div class="flex space-x-4">
                <button @click="selectedCategory = null" :class="{'bg-green-400 text-white': selectedCategory === null, ' text-gray-700 hover:bg-green-500 hover:text-white': selectedCategory !== null}" class="px-6 py-3 rounded-full font-semibold transition duration-200">All</button>
                @foreach($categories as $category)
                    <button @click="selectedCategory = {{ $category->id }}" :class="{'bg-green-400 text-white': selectedCategory === {{ $category->id }}, 'bg-white-200 text-gray-700 hover:bg-green-500 hover:text-white': selectedCategory !== {{ $category->id }}}" class="px-6 py-3 rounded-full font-semibold transition duration-200">{{ $category->name }}</button>
                @endforeach
            </div>
        </div>

        <!-- Products Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8" id="products">
            @foreach($products as $product)
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col transform transition duration-300 hover:shadow-xl hover:scale-105 border border-gray-200" x-show="selectedCategory === null || selectedCategory === {{ $product->category_id }}" data-category-id="{{ $product->category_id }}">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-72 object-cover">
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-4 flex-grow">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
                    <div class="flex justify-between items-center mt-auto">
                        <p class="text-green-400 font-bold text-xl">${{ $product->price }}</p>
                        <a href="{{ url('product?slug=' . $product->name) }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-200">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
