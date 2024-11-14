@extends('layouts.app')

@section('title', 'FurniStyle | Cart')

@section('content')
    <div class="container mx-auto mt-10 px-4">
        <h1 class="text-4xl font-bold text-center mt-10 mb-6">Your Cart</h1>
        <div class="flex flex-col lg:flex-row lg:space-x-12">
            <!-- Cart Items -->
            <div class="w-full lg:w-2/3 bg-white shadow-md rounded-lg p-6">
                @if(Session::has('cart') && count(Session::get('cart')) > 0)
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-2">Product</th>
                                <th class="text-center py-2">Quantity</th>
                                <th class="text-right py-2">Price</th>
                                <th class="text-right py-2">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach(Session::get('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity']; @endphp
                                <tr class="border-b hover:bg-gray-50 transition duration-200">
                                    <td class="py-4 flex items-center">
                                        <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}" class="w-16 h-16 object-cover rounded-lg mr-4">
                                        <div>
                                            <h3 class="text-xl font-semibold">{{ $details['name'] }}</h3>
                                            <p class="text-gray-600">${{ number_format($details['price'], 2) }}</p>
                                        </div>
                                    </td>
                                    <td class="py-4 text-center">
                                        <div class="flex items-center justify-center">
                                            <!-- Decrease Quantity Form -->
                                            <form action="{{ route('cart.decrease', $id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="px-2 py-1 bg-gray-200 rounded-l-lg">-</button>
                                            </form>

                                            <input type="text" value="{{ $details['quantity'] }}" class="w-12 text-center border-t border-b" readonly>

                                            <!-- Increase Quantity Form -->
                                            <form action="{{ route('cart.increase', $id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="px-2 py-1 bg-gray-200 rounded-r-lg">+</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="py-4 text-right">
                                        ${{ number_format($details['price'] * $details['quantity'], 2) }}
                                    </td>
                                    <td class="py-4 text-right">
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <!-- Remove Icon -->
                                                <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600">Your cart is empty.</p>
                @endif
            </div>
            <!-- Order Summary -->
            <div class="w-full lg:w-1/3 bg-white shadow-md rounded-lg p-6 mt-6 lg:mt-0">
                <h2 class="text-2xl font-bold mb-4">Order Summary</h2>
                @if(Session::has('cart') && count(Session::get('cart')) > 0)
                    <div class="border-b pb-4">
                        <!-- List each item in the cart -->
                        @foreach(Session::get('cart') as $id => $details)
                            <div class="flex justify-between mb-2">
                                <div>
                                    <p class="text-gray-700">{{ $details['name'] }} <span class="text-gray-500">x {{ $details['quantity'] }}</span></p>
                                </div>
                                <div>
                                    <p class="font-semibold">${{ number_format($details['price'] * $details['quantity'], 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Total -->
                    <div class="mt-4">
                        <div class="flex justify-between mb-2">
                            <span class="text-lg font-bold">Total</span>
                            <span class="text-lg font-bold">${{ number_format($total, 2) }}</span>
                        </div>
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full mt-4 px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200 text-center">
                        Proceed to Checkout
                    </button>
                </form>
                    </div>
                @else
                    <p class="text-gray-600">No items in cart.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
