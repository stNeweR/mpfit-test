@extends('layouts.main')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Просмотр товара</h1>

    <!-- Информация о товаре -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-4">{{ $product->name }}</h2>
        <p class="text-gray-700 mb-2"><span class="font-bold">Категория:</span> {{ $product->category->name }}</p>
        <p class="text-gray-700 mb-2"><span class="font-bold">Описание:</span> {{ $product->description }}</p>
        <p class="text-gray-700 mb-4"><span class="font-bold">Цена:</span> {{ number_format($product->price, 2, '.', ' ') }}
            руб.</p>

        <!-- Кнопки для редактирования, удаления и возврата -->
        <div class="flex space-x-4">
            <a href="{{ route('products.edit', $product->id) }}"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Редактировать</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                onsubmit="return confirm('Вы уверены, что хотите удалить этот товар?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Удалить</button>
            </form>
            <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Назад
                к списку</a>
        </div>
    </div>

    <!-- Форма для создания заказа -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Создать заказ</h2>

        <form action="{{ route('orders.store', $product->id) }}" method="POST">
            @csrf
            @method('POST')
            <!-- Поле для имени покупателя -->
            <div class="mb-4">
                <label for="customer_name" class="block text-gray-700 font-bold mb-2">ФИО покупателя:</label>
                <input type="text" name="customer_name" id="customer_name"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('customer_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Поле для количества товара -->
            <div class="mb-4">
                <label for="count" class="block text-gray-700 font-bold mb-2">Количество:</label>
                <input type="number" name="count" id="count" min="1"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @error('count')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Поле для комментария -->
            <div class="mb-4">
                <label for="comment" class="block text-gray-700 font-bold mb-2">Комментарий:</label>
                <textarea name="comment" id="comment"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                @error('comment')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Кнопка для создания заказа -->
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Создать
                    заказ</button>
            </div>
        </form>
    </div>
@endsection
