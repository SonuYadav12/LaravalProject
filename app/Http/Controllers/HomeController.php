<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $products = Product::inRandomOrder()->limit(8)->get();
        $reviews = Review::inRandomOrder()->limit(10)->get();

        return view('home', compact('products', 'reviews'));
    }
}
