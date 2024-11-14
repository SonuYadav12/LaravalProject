@extends('admin.index')

@section('admin-content')
<h1 class="text-3xl font-bold mb-6">Category Management</h1>

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

<!-- Add Category Form -->
<div class="mb-6">
    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="flex space-x-4">
            <input type="text" name="name" placeholder="Category Name" class="flex-1 border rounded p-2" required>
            <input type="text" name="description" placeholder="Category Description" class="flex-1 border rounded p-2" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition duration-300">Add Category</button>
    </form>
    @error('name')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
    @error('description')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>

<!-- Categories List -->
<div class="overflow-x-auto">
    <div class="max-h-96 overflow-y-auto">
        <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 text-left font-semibold text-gray-700">ID</th>
                    <th class="py-2 px-4 text-left font-semibold text-gray-700">Name</th>
                    <th class="py-2 px-4 text-left font-semibold text-gray-700">Description</th>
                    <th class="py-2 px-4 text-left font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr class="border-b hover:bg-gray-100 transition duration-300 {{ $loop->even ? 'bg-gray-50' : '' }}">
                        <td class="py-2 px-4">{{ $category->id }}</td>
                        <td class="py-2 px-4">{{ $category->name }}</td>
                        <td class="py-2 px-4">{{ $category->description }}</td>
                        <td class="py-2 px-4">
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition duration-300">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="mt-4">
    {{ $categories->links('pagination::tailwind') }}
</div>
@endsection
