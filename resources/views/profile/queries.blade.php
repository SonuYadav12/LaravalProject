@extends('profile.index')

@section('profile-content')
    <h2 class="text-2xl font-bold mb-4">Your Queries</h2>
    <div class="bg-white shadow-md rounded-lg p-6 mb-8" style="max-height: 300px; overflow-y: auto;">
        @if($queries->isEmpty())
            <p class="text-gray-600">You have not lodged any queries yet.</p>
        @else
            <ul class="space-y-6">
                @foreach($queries as $query)
                    <li class="border-b pb-4 mb-4">
                        <p class="text-gray-700 mb-2"><strong>Query:</strong> {{ $query->message }}</p>
                        <p class="text-gray-500 mb-2"><strong class="text-red-500">Admin:</strong> {{ $query->response ?? 'No response yet' }}</p>
                        <p class="text-gray-400 text-sm">{{ $query->created_at->format('F j, Y, g:i a') }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
