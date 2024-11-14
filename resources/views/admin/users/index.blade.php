@extends('admin.index')

@section('admin-content')
<h1 class="text-3xl font-bold mb-6">User Management</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
        {{ session('error') }}
    </div>
@endif

<!-- Users Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 overflow-y-auto max-h-96">
    @foreach($users as $user)
        @php
            $colors = ['bg-red-100', 'bg-green-100', 'bg-blue-100', 'bg-yellow-100', 'bg-purple-100', 'bg-pink-100', 'bg-indigo-100', 'bg-gray-100', 'bg-teal-100', 'bg-orange-100'];
            $color = $colors[$user->id % 10];
        @endphp
        <div class="{{ $color }} rounded-lg shadow p-6 hover:shadow-lg transition duration-300">
            <h2 class="text-xl font-bold mb-2">{{ $user->name }}</h2>
            <p class="text-gray-700 mb-2"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="text-gray-700 mb-2"><strong>Address:</strong> {{ $user->address }}</p>
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">Delete</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
