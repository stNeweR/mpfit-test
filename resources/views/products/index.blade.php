@extends('layouts.main')

@section('content')
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <h1 class="text-2xl font-bold my-4">Товары</h1>
    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Добавить товар</a>
    <a href="{{ route('orders.index') }}" class="bg-green-500 text-white px-4 py-2 rounded ml-2">Перейти к заказам</a>
    <div class="mt-4">
        @foreach ($products as $product)
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Price: {{ $product->price }} руб.</p>
                <p>Category: {{ $product->category->name }}</p>
                <a href="{{ route('products.edit', $product->id) }}" class="text-blue-500">Редактировать</a>
                <a href="{{ route('products.show', $product->id) }}">Подробнее</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Удалить</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
