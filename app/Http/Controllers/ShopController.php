<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input('category');
        $query = Product::query();

        if ($category) {
            $query->where('category_id', $category);
        }

        $products = $query->get();
        $categories = Category::all();

        return view('product.index', compact('products', 'categories'));
    }

    public function show(Request $request)
    {
        $slug = urldecode($request->query('slug'));
        $product = Product::where('name', $slug)->firstOrFail();
        $reviews = $product->reviews()->with('user')->get();
        return view('product.show', compact('product', 'reviews'));
    }

    public function review(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($productId);

        $product->reviews()->create([
            'user_id' => Auth::user()->id,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('product.show', ['slug' => $product->name])->with('success', 'Review added successfully!');
    }
}
