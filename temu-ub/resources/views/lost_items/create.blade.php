@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Report Lost Item</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('lost-items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="item_type" class="block font-medium mb-1">Item Type</label>
            <select name="item_type" id="item_type" class="w-full border-gray-300 rounded-md shadow-sm">
                <option value="Laptop">Laptop</option>
                <option value="Phone">Phone</option>
                <option value="Accessories">Accessories</option>
                <option value="Shoes">Shoes</option>
                <option value="Utilities">Utilities</option>
                <option value="Others">Others</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="item_name" class="block font-medium mb-1">Item Name</label>
            <input type="text" name="item_name" id="item_name" class="w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="item_color" class="block font-medium mb-1">Item Color</label>
            <input type="text" name="item_color" id="item_color" class="w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium mb-1">Description</label>
            <textarea name="description" id="description" class="w-full border-gray-300 rounded-md shadow-sm" rows="3"></textarea>
        </div>

        <div class="mb-4">
            <label for="location_found" class="block font-medium mb-1">Location Found</label>
            <input type="text" name="location_found" id="location_found" class="w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="date_found" class="block font-medium mb-1">Date Found</label>
            <input type="date" name="date_found" id="date_found" class="w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-6">
            <label for="image" class="block font-medium mb-1">Upload Image</label>
            <input type="file" name="image" id="image" class="w-full">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Submit
        </button>
    </form>
</div>
@endsection
