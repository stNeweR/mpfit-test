<?php

namespace App\Http\Controllers;

use App\DTO\OrderDTO;
use App\Enums\OrderStatus;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function store(OrderRequest $request, $id)
    {
        $data = OrderDTO::fromRequest($request);
        $product = Product::query()->find($id);

        if (!$product) {
            throw new Exception('Не удалось найти товар');
        }

        $totalPrice = $product['price'] * $data->getCount();

        Order::query()->create([
            'customer_name' => $data->getCustomerName(),
            'order_date' => now(),
            'status' => OrderStatus::NEW->value,
            'comment' => $data->getComment(),
            'product_id' => $id,
            'count' => $data->getCount(),
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('orders.index');
    }

    public function show($id)
    {
        $order = Order::with('product')->find($id);

        return view('orders.show', compact('order'));
    }

    public function updateStatus($id)
    {
        Order::query()->find($id)->update([
            'status' => OrderStatus::COMPLETED->value
        ]);

        return redirect()->route('orders.show', $id);
    }
}
