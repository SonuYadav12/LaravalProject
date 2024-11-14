@extends('layouts.app')

@section('title', $product->name . ' | FurniStyle')

@section('content')
    <div class="container mx-auto mt-10 flex flex-col md:flex-row gap-8">
        <!-- Product Section -->
        <div class="w-full md:w-2/3 bg-white shadow-md rounded-lg overflow-hidden">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-auto object-contain">
            <div class="p-6">
                <h1 class="text-4xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                <p class="text-green-400 font-bold text-xl mb-4">${{ $product->price }}</p>
                <p class="text-gray-600 mb-4">Stock: {{ $product->stock }}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition duration-200">Add to Cart</button>
                </form>
            </div>
        </div>

        <!-- Review Section -->
        <div class="w-full md:w-1/3">
            <h2 class="text-2xl font-bold mb-4">Reviews</h2>
            <div class="bg-white shadow-md rounded-lg p-6 mb-8" style="max-height: 400px; overflow-y: scroll;">
                @foreach($reviews as $review)
                    <div class="mb-4 p-4 border rounded-lg bg-gray-50">
                        <div class="flex items-center mb-2">
                            <div class="flex items-center text-yellow-500">
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <svg class="w-5 h-5 text-yellow-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><polygon points="10 15 4 17 6 11 1 7 7 6 10 1 13 6 19 7 14 11 16 17" /></svg>
                                @endfor
                                @for ($i = $review->rating; $i < 5; $i++)
                                    <svg class="w-5 h-5 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><polygon points="10 15 4 17 6 11 1 7 7 6 10 1 13 6 19 7 14 11 16 17" /></svg>
                                @endfor
                            </div>
                            <span class="ml-2 text-gray-600 font-semibold">{{ $review->user->name }}</span>
                        </div>
                        <p class="text-gray-600">{{ $review->comment }}</p>
                        <p class="text-gray-400 text-sm mt-2">{{ $review->created_at->format('F j, Y, g:i a') }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Leave a Review Section -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                <h2 class="text-2xl font-bold mb-4">Leave a Review</h2>
                <form action="{{ route('product.review', $product->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="rating" class="block text-gray-700">Rating</label>
                        <select name="rating" id="rating" class="w-full mt-2 p-2 border rounded-lg">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="comment" class="block text-gray-700">Comment</label>
                        <textarea name="comment" id="comment" rows="4" class="w-full mt-2 p-2 border rounded-lg"></textarea>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-800 transition duration-200">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@if(session('success'))
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "timeOut": "3000"
        };
        toastr.success("{{ session('success') }}");
    </script>
@endif
