@extends('layouts.app')

@section('title', 'FurniStyle | About')

@section('content')
    <div class="container mx-auto mt-10 px-4">
        <h1 class="text-4xl font-bold text-center mt-10">About Us</h1>
        <p class="text-center mt-4 mb-10 text-gray-600">Learn more about our furniture store.</p>

        <!-- About Section -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-3xl font-bold mb-4">Welcome to <span class="text-green-400">FurniStyle</span></h2>
            <p class="text-gray-700 mb-4">
                At FurniStyle, we believe that furniture is more than just a functional piece in your home. It's a reflection of your style and personality. We are dedicated to providing high-quality, stylish furniture that meets the needs and tastes of our diverse clientele.
            </p>
            <p class="text-gray-700 mb-4">
                Our collection includes a wide range of furniture for every room in your home, from the living room to the bedroom, dining room, and beyond. Each piece is carefully selected for its design, durability, and value.
            </p>
            <p class="text-gray-700 mb-4">
                We pride ourselves on our exceptional customer service and our commitment to ensuring that every customer finds the perfect piece of furniture to complete their home.
            </p>
        </div>

        <!-- Unique Features Section -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-3xl font-bold mb-4">Why Choose <span class="text-green-400">FurniStyle</span>?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2">High-Quality Materials</h3>
                    <p class="text-gray-700">We use only the best materials to ensure that our furniture is durable and long-lasting.</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2">Stylish Designs</h3>
                    <p class="text-gray-700">Our furniture is designed to be both functional and stylish, with a wide range of styles to suit any taste.</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2">Affordable Prices</h3>
                    <p class="text-gray-700">We believe that high-quality furniture should be accessible to everyone, which is why we offer competitive prices on all of our products.</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2">Exceptional Customer Service</h3>
                    <p class="text-gray-700">Our team is dedicated to providing the best possible customer service, from helping you find the perfect piece to ensuring that your order arrives on time and in perfect condition.</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2">Sustainable Practices</h3>
                    <p class="text-gray-700">We are committed to sustainability and use eco-friendly materials and practices whenever possible.</p>
                </div>
            </div>
        </div>

        <!-- Our Mission Section -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-3xl font-bold mb-4">Our Mission</h2>
            <p class="text-gray-700 mb-4">
                Our mission is to provide high-quality, stylish furniture that enhances the beauty and functionality of your home. We are committed to offering exceptional customer service and ensuring that every customer finds the perfect piece of furniture to suit their needs and style.
            </p>
        </div>

        <!-- Location Section -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-3xl font-bold mb-4">Our Location</h2>
            <div id="map" class="w-full h-64 rounded-lg"></div>
        </div>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([51.505, -0.09], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([25.435018, 81.838644]).addTo(map)
                .bindPopup('FurniStyle Location')
                .openPopup();
        });
    </script>
@endsection
