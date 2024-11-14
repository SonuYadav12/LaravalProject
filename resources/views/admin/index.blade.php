@extends('layouts.app')

@section('title', 'FurniStyle | Admin Dashboard')

@section('content')
<div class="container mx-auto py-12 flex">
    <!-- Admin Sidebar -->
    <div class="w-1/4 bg-white p-6 rounded-lg shadow-lg font-bold">
        <ul class="space-y-4">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 hover:text-blue-400 px-4 py-2 rounded-lg {{ Request::routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-400' : '' }}">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('admin.users') }}" class="block text-gray-700 hover:text-blue-400 px-4 py-2 rounded-lg {{ Request::routeIs('admin.users') ? 'bg-blue-100 text-blue-400' : '' }}">User Management</a>
            </li>
            <li>
                <a href="{{ route('admin.queries') }}" class="block text-gray-700 hover:text-blue-400 px-4 py-2 rounded-lg {{ Request::routeIs('admin.queries') ? 'bg-blue-100 text-blue-400' : '' }}">Manage Queries</a>
            </li>
            <li>
                <a href="{{ route('admin.categories') }}" class="block text-gray-700 hover:text-blue-400 px-4 py-2 rounded-lg {{ Request::routeIs('admin.categories') ? 'bg-blue-100 text-blue-400' : '' }}">Category Management</a>
            </li>
            <li>
                <a href="{{ route('admin.products') }}" class="block text-gray-700 hover:text-blue-400 px-4 py-2 rounded-lg {{ Request::routeIs('admin.products') ? 'bg-blue-100 text-blue-400' : '' }}">Product Management</a>
            </li>
            <li>
                <a href="{{ route('admin.orders') }}" class="block text-gray-700 hover:text-blue-400 px-4 py-2 rounded-lg {{ Request::routeIs('admin.orders') ? 'bg-blue-100 text-blue-400' : '' }}">Order Management</a>
            </li>
            <li>
                <form action="{{ route('profile.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-center bg-white text-red-500 hover:text-white hover:bg-red-500 hover:px-4 py-2
                    transition-all duration-200 rounded-lg">Logout</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Admin Content Area -->
    <div class="w-3/4 bg-white p-8 rounded-lg shadow-lg ml-6">
        @yield('admin-content')
    </div>
</div>
@endsection
