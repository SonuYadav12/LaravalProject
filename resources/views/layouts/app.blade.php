<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Furniture Store')</title>
    @vite('resources/css/app.css') <!-- For Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles <!-- For Livewire styles -->
</head>
<body class="bg-gray-100 font-poppins flex flex-col min-h-screen">
    <header class="bg-white shadow-md">
        <div class="container mx-auto py-4 px-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-green-400"><a href="/">FurniStyle</a></h1>
            <nav class="flex space-x-4">
                <a href="/" class="text-gray-600 font-bold hover:text-green-400 px-4 py-2 transition duration-200 ease-in-out transform {{ Request::is('/') ? 'text-green-400 scale-110' : '' }}">Home</a>
                <a href="/shop" class="text-gray-600 font-bold hover:text-green-400 px-4 py-2 transition duration-200 ease-in-out transform {{ Request::is('shop') ? 'text-green-400 scale-110' : '' }}">Shop</a>
                <a href="/about" class="text-gray-600 font-bold hover:text-green-400 px-4 py-2 transition duration-200 ease-in-out transform {{ Request::is('about') ? 'text-green-400 scale-110' : '' }}">About</a>
                <a href="/contact" class="text-gray-600 font-bold hover:text-green-400 px-4 py-2 transition duration-200 ease-in-out transform {{ Request::is('contact') ? 'text-green-400 scale-110' : '' }}">Contact</a>
                <a href="/cart" class="text-gray-600 font-bold hover:text-green-400 px-4 py-2 transition duration-200 ease-in-out transform {{ Request::is('cart') ? 'text-green-400 scale-110' : '' }}">Cart</a>
                @auth
                    <a href="/profile" class="text-gray-600 font-bold hover:text-green-400 px-4 py-2 transition duration-200 ease-in-out transform {{ Request::is('profile') ? 'text-green-400 scale-110' : '' }}">{{ Auth::user()->role === 'admin' ? 'Dashboard' : 'Profile' }}</a>
                @else
                    <a href="/login" class="text-gray-600 font-bold hover:text-blue-400 px-4 py-2 transition duration-200 ease-in-out transform {{ Request::is('login') ? 'text-blue-400 scale-110' : '' }}">Login</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="container mx-auto py-6 px-6 flex-grow">
        @yield('content')
    </main>

    <footer class="bg-white shadow-md mt-10">
        <div class="container mx-auto py-4 px-6 flex justify-between items-center">
            <p class="text-green-400 font-bold">FurniStyle</p>
            <p class="text-gray-600">Made with <span class="text-red-500">&hearts;</span> by Sonu Yadav</p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
