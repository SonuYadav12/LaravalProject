@extends('layouts.app')

@section('title', 'FurniStyle | Contact')

@section('content')
    <div class="container mx-auto mt-10 px-4">
        <h1 class="text-4xl font-bold text-center mt-10">Contact Us</h1>
        <p class="text-center mt-4 mb-10 text-gray-600">Get in touch with us for any queries.</p>

        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-semibold">Your Message</label>
                    <textarea name="message" id="message" rows="4" class="w-full mt-2 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200" required></textarea>
                </div>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 transition duration-200 transform hover:scale-105">Send Message</button>
            </form>
        </div>
    </div>
@endsection
