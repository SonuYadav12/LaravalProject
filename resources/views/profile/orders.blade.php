@extends('profile.index')

@section('profile-content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-8 text-center">Order History</h1>
    @if($orders->isEmpty())
        <p class="text-gray-600 text-center">You have no orders.</p>
    @else
        <div class="overflow-y-auto max-h-[70vh] scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
            <div class="space-y-8">
                @foreach($orders as $order)
                    <div class="bg-white shadow-md rounded-lg p-6 transition-transform transform hover:scale-105">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                            <div>
                                <h3 class="text-2xl font-semibold text-indigo-600">Order #{{ $order->id }}</h3>
                                <p class="text-gray-500">Placed on {{ $order->created_at->format('F d, Y') }}</p>
                            </div>
                            <div class="mt-4 md:mt-0">
                                <span class="inline-block px-3 py-1 text-sm font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                    {{ $order->status }}
                                </span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-lg font-medium">Total: <span class="text-gray-800">${{ number_format($order->total_price, 2) }}</span></p>
                        </div>

                        <!-- Order Items -->
                        <div class="mt-6">
                            <h4 class="text-xl font-semibold mb-4 text-gray-700">Items:</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($order->orderItems as $item)
                                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg shadow-sm">
                                        <!-- Product Image -->
                                        <div class="flex-shrink-0">
                                            <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}" class="w-16 h-16 object-cover rounded-md">
                                        </div>
                                        <!-- Product Details -->
                                        <div class="flex-1">
                                            <h5 class="text-lg font-medium text-gray-800">{{ $item->product->name }}</h5>
                                            <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                                            <p class="text-sm text-gray-500">Price: ${{ number_format($item->price, 2) }} each</p>
                                        </div>
                                        <!-- Item Total -->
                                        <div>
                                            <span class="text-sm font-semibold text-gray-800">${{ number_format($item->price * $item->quantity, 2) }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
