@extends('profile.index')

@section('profile-content')
<h1 class="text-4xl font-bold mb-8">Update Password</h1>
<form action="{{ route('profile.password.update') }}" method="POST" class="bg-white p-8  transform transition duration-300 ">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="current_password" class="block text-gray-700 font-semibold mb-2">Current Password</label>
            <input type="password" name="current_password" id="current_password" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">
        </div>
        <div>
            <label for="new_password" class="block text-gray-700 font-semibold mb-2">New Password</label>
            <input type="password" name="new_password" id="new_password" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">
        </div>
        <div class="col-span-1 md:col-span-2">
            <label for="new_password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200">
        </div>
    </div>
    <div class="mt-6 text-right">
        <button type="submit" class="bg-green-400 text-white px-6 py-3 rounded-full hover:bg-green-500 transition duration-200 font-bold">Update Password</button>
    </div>
</form>
@endsection
