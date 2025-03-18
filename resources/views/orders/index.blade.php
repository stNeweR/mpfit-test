@extends('layouts.main')

@section('content')
    <h1 class="text-2xl font-bold my-4">Заказы</h1>

    <!-- Список заказов -->
    <div class="mt-4">
        @foreach ($orders as $order)
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-xl font-bold">Заказ #{{ $order->id }}</h2>
                <p>Покупатель: {{ $order->customer_name }}</p>
                <p>Дата заказа: {{ $order->order_date }}</p>
                <p>Статус: {{ $order->status }}</p>
                <p>Итоговая цена: {{ $order->total_price }} руб.</p>

                <!-- Ссылки для просмотра и изменения статуса -->
                <div class="mt-4 space-x-4">
                    <a href="{{ route('orders.show', $order->id) }}" class="text-blue-500 hover:text-blue-700">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
