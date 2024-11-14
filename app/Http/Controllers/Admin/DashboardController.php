<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::all()->count();
        $totalOrders = Order::all()->count();
        $totalProducts = Product::all()->count();
        $totalCategories = Category::all()->count();

        return view('admin.dashboard', compact(['totalUsers', 'totalOrders', 'totalProducts', 'totalCategories']));
    }
}
