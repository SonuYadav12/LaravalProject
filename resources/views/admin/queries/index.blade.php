@extends('admin.index')

@section('admin-content')
<h1 class="text-3xl font-bold mb-6">Manage Queries</h1>

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

<!-- Queries Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 overflow-y-auto max-h-96">
    @foreach($queries as $query)
        <div class="bg-blue-200 rounded-lg shadow p-6 hover:shadow-lg transition duration-300">
            <h2 class="text-xl font-bold mb-2">Query #{{ $query->id }}</h2>
            <p class="text-gray-700 mb-2"><strong>User:</strong> {{ $query->user->name }}</p>
            <p class="text-gray-700 mb-2"><strong>Message:</strong> {{ $query->message }}</p>
            @if($query->status !== 'Replied')
                <form action="{{ route('admin.queries.reply', $query->id) }}" method="POST">
                    @csrf
                    <textarea name="reply_message" rows="2" class="w-full border rounded p-2 mb-2 bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" placeholder="Enter your reply"></textarea>
                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition duration-300">Reply</button>
                </form>
            @else
                <p class="text-green-600">Replied</p>
            @endif
        </div>
    @endforeach
</div>
@endsection
