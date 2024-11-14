<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\QueryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ShopController;

// Home Route
Route::get('/', [HomeController::class, 'show'])->name('home');

// Registration Routes
Route::get('register', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return app(RegisterController::class)->showRegistrationForm();
})->name('register');

Route::post('register', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return app(RegisterController::class)->register(request());
});

// Login Routes
Route::get('login', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return app(LoginController::class)->showLoginForm();
})->name('login');

Route::post('login', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return app(LoginController::class)->login(request());
});

// Logout Route
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {

    // Shop Routes
    Route::get('shop', [ShopController::class, 'index'])->name('shop');
    Route::get('product', [ShopController::class, 'show'])->name('product.show');
    Route::post('product/{productId}/review', [ShopController::class, 'review'])->name('product.review');

    // Informational Routes
    Route::get('about', function () {
        return view('about');
    })->name('about');

    Route::get('contact', function () {
        return view('contact');
    })->name('contact');

    Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

    // Cart Routes
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('cart/increase/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
    Route::post('cart/decrease/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');

    // Checkout Routes
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/order-success', [OrderController::class, 'success'])->name('order.success');

    // Profile Routes
    Route::get('profile', function () {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('profile.details');
        }
    });

    Route::get('profile/details', [ProfileController::class, 'details'])->name('profile.details');
    Route::get('profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/logout', [ProfileController::class, 'logout'])->name('profile.logout');
    Route::get('profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('profile/queries', [ProfileController::class, 'queries'])->name('profile.queries');
    Route::post('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

// Admin Routes (Without Middleware)
Route::prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // User Management
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    // Query Management
    Route::get('/queries', [QueryController::class, 'index'])->name('admin.queries');
    Route::post('/queries/{id}/reply', [QueryController::class, 'reply'])->name('admin.queries.reply');

    // Category Management
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Product Management
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // Order Management
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::post('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
});
