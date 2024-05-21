<?php

use App\Http\Controllers\PackagesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified']);


Route::get('/packages', [PackagesController::class, 'index'])->name('packages.index')->middleware(['auth', 'verified']);
Route::get('packages/{package}', [PackagesController::class, 'show'])->name('packages.show')->middleware(['auth', 'verified']);

Route::get('cart', [CartsController::class, 'index'])->name('cart.index')->middleware(['auth', 'verified']);
Route::post('cart', [CartsController::class, 'store'])->name('cart.store')->middleware(['auth', 'verified']);
Route::delete('cart/{package}', [CartsController::class, 'destroy'])->name('cart.destroy')->middleware(['auth', 'verified']);

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::post('packages', [PackagesController::class,'crear'])->name('packages.create');
    Route::get('packages/edit/{id}', [ PackagesController::class, 'edit' ]) -> name('packages.edit'); 
    Route::put('packages/edit/{id}', [ PackagesController::class, 'update' ]) -> name('packages.update');
    Route::delete('packages/delete/{id}', [ PackagesController::class, 'delete' ]) -> name('packages.delete');
});
