<?php

use App\Http\Controllers\CartsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\ShirtsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/packages', [PackagesController::class, 'index'])->name('packages.index');
Route::get('/packages/{id}', [PackagesController::class, 'show'])->name('packages.show');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', function () {
        return view('auth.dashboard');
    });
    
    Route::get('cart', [CartsController::class, 'index'])->name('cart.index');
    Route::post('cart', [CartsController::class, 'store'])->name('cart.store');
    Route::get('/cart/remove/{index}', [CartsController::class, 'removeItem'])->name('cart.remove');
    Route::post('/cart/checkout', [CartsController::class, 'checkout'])->name('cart.checkout');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::post('packages', [PackagesController::class,'crear'])->name('packages.create');
    Route::get('packages/edit/{id}', [ PackagesController::class, 'edit' ]) -> name('packages.edit'); 
    Route::put('packages/edit/{id}', [ PackagesController::class, 'update' ]) -> name('packages.update');
    Route::delete('packages/delete/{id}', [ PackagesController::class, 'delete' ]) -> name('packages.delete');

    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/unsent', [OrdersController::class, 'unsentOrders'])->name('orders.unsent');
    Route::post('/orders/{order}/send', [OrdersController::class, 'sendOrder'])->name('orders.send');
});
