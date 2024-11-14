<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        // Check if the cart is empty
        if (!Session::has('cart') || count(Session::get('cart')) == 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Retrieve the cart items
        $cart = Session::get('cart');

        // Create a new order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->total_price = 0; // Will calculate later
        $order->status = 'Pending';
        $order->save();

        $totalPrice = 0;

        // Loop through the cart items and create order items
        foreach ($cart as $productId => $details) {
            $product = Product::find($productId);
            if ($product) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $productId;
                $orderItem->quantity = $details['quantity'];
                $orderItem->price = $product->price;
                $orderItem->save();

                $totalPrice += $product->price * $details['quantity'];

                // Optional: Deduct the stock
                // $product->stock -= $details['quantity'];
                // $product->save();
            }
        }

        // Update the total price of the order
        $order->total_price = $totalPrice;
        $order->save();

        // Clear the cart
        Session::forget('cart');

        // Redirect to an order success page with a success message
        return redirect()->route('order.success')->with('success', 'Order placed successfully!');
    }

    public function success()
    {
        return view('order.success');
    }
}
