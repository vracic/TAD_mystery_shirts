<?php

use App\Http\Controllers\PackagesController;
use App\Http\Controllers\ShirtsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', function () {
        return view('auth.dashboard');
    });
    Route::get('/packages', [PackagesController::class, 'index'])->name('packages.index');
    Route::get('packages/{package}', [PackagesController::class, 'show'])->name('packages.show');
    
    Route::get('cart', [CartsController::class, 'index'])->name('cart.index');
    Route::post('cart', [CartsController::class, 'store'])->name('cart.store');
    Route::delete('cart/{package}', [CartsController::class, 'destroy'])->name('cart.destroy');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::post('packages', [PackagesController::class,'crear'])->name('packages.create');
    Route::get('packages/edit/{id}', [ PackagesController::class, 'edit' ]) -> name('packages.edit'); 
    Route::put('packages/edit/{id}', [ PackagesController::class, 'update' ]) -> name('packages.update');
    Route::delete('packages/delete/{id}', [ PackagesController::class, 'delete' ]) -> name('packages.delete');

    Route::post('shirts', [ShirtsController::class,'crear'])->name('shirts.create');
    Route::get('shirts/edit/{id}', [ ShirtsController::class, 'edit' ]) -> name('shirts.edit'); 
    Route::put('shirts/edit/{id}', [ ShirtsController::class, 'update' ]) -> name('shirts.update');
    Route::delete('shirts/delete/{id}', [ ShirtsController::class, 'delete' ]) -> name('shirts.delete');

    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/unsent', [OrdersController::class, 'unsentOrders'])->name('orders.unsent');
    Route::post('/orders/{order}/send', [OrdersController::class, 'sendOrder'])->name('orders.send');
});
