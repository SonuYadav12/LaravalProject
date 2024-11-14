@extends('layouts.app')

@section('title', 'FurniStyle | Home')

@section('content')

<!-- Hero Section -->
<section class="relative bg-cover bg-center h-96" style="background-image: url('/images/hero.webp');">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="container mx-auto h-full flex items-center justify-center relative">
        <div class="text-center text-gray-100">
            <h1 class="text-5xl font-bold mb-4">Discover Your Style</h1>
            <p class="text-xl mb-8">Quality furniture for every room</p>
            <a href="/about" class="bg-green-400 text-white px-6 py-3 font-bold rounded-full hover:bg-green-500 transition duration-200">Know about us</a>
        </div>
    </div>
</section>

<!-- Random Products Section -->
<section class="py-16">
    <div class="container mx-auto">
        <h2 class="text-4xl font-bold text-center mb-12">Our Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach($products as $product)
            <div class="bg-white shadow-md rounded-lg overflow-hidden flex flex-col transform transition duration-300 hover:shadow-xl hover:scale-105">
                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="text-xl font-bold mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-4 flex-grow">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
                    <p class="text-green-400 font-bold text-xl mb-4">${{ $product->price }}</p>
                    <a href="{{ url('product?slug=' . $product->name) }}" class="bg-green-400 text-white px-4 py-2 rounded-full hover:bg-green-500 transition duration-200 mt-auto text-center">Shop Now</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Random Reviews Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto">
        <h2 class="text-4xl font-bold text-center mb-12">Customer Reviews</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($reviews as $review)
            <div class="bg-white shadow-md rounded-lg p-6 transform transition duration-300 hover:shadow-xl hover:scale-105">
                <p class="text-gray-700 mb-4">"{{ $review->comment }}"</p>
                <p class="text-green-400 font-bold">- {{ $review->user->name }}</p>
                <div class="flex items-center mt-2">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $review->rating)
                            <!-- Filled Star -->
                            <svg class="w-5 h-5 text-yellow-500 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"><polygon
                                    points="10 15 4 17 6 11 1 7 7 6 10 1 13 6 19 7 14 11 16 17" /></svg>
                        @else
                            <!-- Empty Star -->
                            <svg class="w-5 h-5 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"><polygon
                                    points="10 15 4 17 6 11 1 7 7 6 10 1 13 6 19 7 14 11 16 17" /></svg>
                        @endif
                    @endfor
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
