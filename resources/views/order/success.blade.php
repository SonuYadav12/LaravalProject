@extends('layouts.app')

@section('title', 'Order Successful')

@section('content')
    <div class="container mx-auto mt-10 text-center">
        <h1 class="text-4xl font-bold mb-4">Order Successful!</h1>
        <p class="text-lg mb-6">Thank you for your purchase!</p>
        <p>You will be redirected to the home page shortly.</p>
    </div>

    <script>
        setTimeout(function(){
            window.location.href = "{{ route('home') }}";
        }, 5000); // Redirect after 5 seconds (5000 milliseconds)
    </script>
@endsection
