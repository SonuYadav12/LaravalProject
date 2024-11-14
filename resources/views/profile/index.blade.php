@extends('layouts.app')

@section('title', 'FurniStyle | Profile')

@section('content')
<div class="container mx-auto py-12 flex">
    <!-- Sidebar -->
    <div class="w-1/4 bg-white p-6 rounded-lg shadow-lg font-bold">
        <ul class="space-y-4">
            <li>
                <a href="{{ route('profile.details') }}" class="block text-gray-700 hover:text-green-400 px-4 py-2 rounded-lg {{ Request::routeIs('profile.details') ? 'bg-green-100 text-green-400' : '' }}">Personal Details</a>
            </li>
            <li>
                <a href="{{ route('profile.orders') }}" class="block text-gray-700 hover:text-green-400 px-4 py-2 rounded-lg {{ Request::routeIs('profile.orders') ? 'bg-green-100 text-green-400' : '' }}">Order History</a>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}" class="block text-gray-700 hover:text-green-400 px-4 py-2 rounded-lg {{ Request::routeIs('profile.edit') ? 'bg-green-100 text-green-400' : '' }}">Update Profile</a>
            </li>
            <li>
                <a href="{{ route('profile.password') }}" class="block text-gray-700 hover:text-green-400 px-4 py-2 rounded-lg {{ Request::routeIs('profile.password') ? 'bg-green-100 text-green-400' : '' }}">Update Password</a>
            </li>
            <li>
                <a href="{{ route('profile.queries') }}" class="block text-gray-700 hover:text-green-400 px-4 py-2 rounded-lg {{ Request::routeIs('profile.queries') ? 'bg-green-100 text-green-400' : '' }}">Queries</a>
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

    <!-- Content Area -->
    <div class="w-3/4 bg-white p-8 rounded-lg shadow-lg ml-6">
        @yield('profile-content')
    </div>
</div>
@endsection
