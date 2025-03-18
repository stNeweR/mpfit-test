<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::resource('products', ProductController::class)->except('index');

Route::prefix('orders')->as('orders.')->group(function () {
    Route::get('', [OrderController::class, 'index'])->name('index');
    Route::post('{id}', [OrderController::class, 'store'])->name('store');
    Route::get('{id}', [OrderController::class, 'show'])->name('show');
    Route::patch('{id}', [OrderController::class, 'updateStatus'])->name('updateStatus');
});
