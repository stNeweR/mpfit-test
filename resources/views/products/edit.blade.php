@extends('layouts.main')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Редактировать товар</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Название товара:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-bold mb-2">Категория:</label>
            <select name="category_id" id="category_id"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Описание:</label>
            <textarea name="description" id="description"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Цена:</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Обновить</button>
            <a href="{{ route('products.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Отмена</a>
        </div>
    </form>
@endsection
