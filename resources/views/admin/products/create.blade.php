@extends('admin.index')

@section('admin-content')
<h1 class="text-3xl font-bold mb-6">Add New Product</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
        <ul>
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
        <label class="block text-gray-700">Product Name</label>
        <input type="text" name="name" class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block text-gray-700">Category</label>
        <select name="category_id" class="w-full border rounded p-2" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-gray-700">Price</label>
        <input type="number" step="0.01" name="price" class="w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block text-gray-700">Product Image</label>
        <input type="file" name="image" accept="image/*" class="w-full border rounded p-2" required>
    </div>

    <!-- Add other fields as necessary -->

    <div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Add Product</button>
    </div>
</form>
@endsection
