@extends('layouts.main')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Детали заказа #{{ $order->id }}</h1>

    <!-- Информация о заказе -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold mb-4">Информация о заказе</h2>

        <div class="space-y-4">
            <p><span class="font-bold">Покупатель:</span> {{ $order->customer_name }}</p>
            <p><span class="font-bold">Дата заказа:</span> {{ $order->order_date }}</p>
            <p><span class="font-bold">Статус:</span> {{ $order->status }}</p>
            <p><span class="font-bold">Комментарий:</span> {{ $order->comment ?? 'Нет комментария' }}</p>
            <p><span class="font-bold">Товар:</span> {{ $order->product->name }}</p>
            <p><span class="font-bold">Количество:</span> {{ $order->count }}</p>
            <p><span class="font-bold">Итоговая цена:</span> {{ number_format($order->total_price, 2, '.', ' ') }} руб.</p>
        </div>
    </div>

    <!-- Кнопка для изменения статуса заказа -->
    @if ($order->status->value === App\Enums\OrderStatus::NEW->value)
        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="mt-6">
            @csrf
            @method('PATCH')
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Отметить как выполненный
            </button>
        </form>
    @else
        <p class="text-gray-600 mt-6">Заказ уже выполнен.</p>
    @endif

    <!-- Ссылка для возврата к списку заказов -->
    <div class="mt-6">
        <a href="{{ route('orders.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Назад к списку заказов
        </a>
    </div>
@endsection
