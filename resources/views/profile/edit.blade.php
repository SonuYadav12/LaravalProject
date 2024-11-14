@extends('profile.index')

@section('profile-content')
<h1 class="text-4xl font-bold mb-8">Update Profile</h1>
<form action="{{ route('profile.update') }}" method="POST" class="bg-white p-8 transform transition duration-300">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">
        </div>
        <div>
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">
        </div>
        <div class="col-span-1 md:col-span-2">
            <label for="address" class="block text-gray-700 font-semibold mb-2">Address</label>
            <input type="text" name="address" id="address" value="{{ Auth::user()->address }}" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">
        </div>
    </div>
    <div class="mt-6 text-right">
        <button type="submit" class="bg-green-400 text-white px-6 py-3 rounded-full hover:bg-green-500 transition duration-200 font-bold">Save Changes</button>
    </div>
</form>
@endsection
