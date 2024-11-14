@extends('profile.index')

@section('profile-content')
<h1 class="text-4xl font-bold mb-8">Personal Details</h1>
<div class="flex items-center mb-10">
    <div class="w-24 h-24 bg-green-400 text-white rounded-full flex items-center justify-center text-3xl font-bold shadow-lg transform transition duration-300 hover:scale-105">
        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
    </div>
    <div class="ml-6">
        <h2 class="text-2xl font-bold">{{ Auth::user()->name }}</h2>
        <p class="text-gray-600">{{ Auth::user()->email }}</p>
    </div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="bg-white p-6 rounded-lg shadow-lg transform transition duration-300 hover:shadow-xl">
        <h3 class="text-xl font-semibold mb-4">Personal Information</h3>
        <ul class="text-gray-700 space-y-2">
            <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
            <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
        </ul>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg transform transition duration-300 hover:shadow-xl">
        <h3 class="text-xl font-semibold mb-4">Address</h3>
        <p class="text-gray-700">{{ Auth::user()->address ?? 'No address provided.' }}</p>
    </div>
</div>
@endsection
