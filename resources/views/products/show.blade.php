@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Просмотр товара</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">{{ $product->name }}</h2>
            <p class="text-gray-700 mb-2"><span class="font-bold">Категория:</span> {{ $product->category->name }}</p>
            <p class="text-gray-700 mb-2"><span class="font-bold">Описание:</span> {{ $product->description }}</p>
            <p class="text-gray-700 mb-4"><span class="font-bold">Цена:</span>
                {{ number_format($product->price, 2, '.', ' ') }} руб.</p>

            <div class="flex space-x-4">
                <a href="{{ route('products.edit', $product->id) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Редактировать</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Удалить</button>
                </form>
                <a href="{{ route('products.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Назад к списку</a>
            </div>
        </div>
    </div>
@endsection
