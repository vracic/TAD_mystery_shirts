<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PackagesController;
use App\Http\Controllers\UsersController;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;



Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', [PackagesController::class, 'index'])->name('packages.index');

    Route::get('toggleLang', function () {
        $currentLocale = Session::get('locale');
        $newLocale = $currentLocale === 'en' ? 'es' : 'en';
        App::setLocale($newLocale);
        Session::put('locale', $newLocale);
    
        $user = User::findOrFail(auth()->id());
        $packages = Package::all();
        return view('index', compact('packages', 'user'));
    })->name('toggleLang');
    
    Route::get('/home', [PackagesController::class, 'index'])->name('packages.index');
    Route::get('/packages/{id}', [PackagesController::class, 'show'])->name('packages.show');

    
    Route::get('cart', [CartsController::class, 'index'])->name('cart.index');
    Route::post('cart/store', [CartsController::class, 'store'])->name('cart.store');
    Route::post('/cart/remove/{index}', [CartsController::class, 'removeItem'])->name('cart.remove');
    Route::post('/cart/checkout', [CartsController::class, 'checkout'])->name('cart.checkout');
    
    Route::get('/users/details', [UsersController::class, 'show'])->name('users.show');
    Route::put('/users', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{package_id}', [UsersController::class, 'changeFavorite'])->name('users.changeFavorite');
});


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::post('packages', [PackagesController::class,'crear'])->name('packages.create');
    Route::get('packages/edit/{id}', [ PackagesController::class, 'edit' ]) -> name('packages.edit'); 
    Route::put('packages/edit/{id}', [ PackagesController::class, 'update' ]) -> name('packages.update');
    Route::delete('packages/delete/{id}', [ PackagesController::class, 'delete' ]) -> name('packages.delete');
    
    Route::get('/orders', [AdminController::class, 'allOrders'])->name('orders.index');
    Route::get('/orders/unsent', [OrdersController::class, 'unsentOrders'])->name('orders.unsent');
    Route::post('/orders/{order_id}/send', [OrdersController::class, 'sendOrder'])->name('orders.send');
   
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
});
