<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {

    // Route::get('/cart', [CartController::class, 'index'])->name('cart');
    // Route::post('/cart/items', [CartController::class, 'store'])->name('cart.store');
    // Route::patch('/cart/items/{item}', [CartController::class, 'updateItem'])->name('cart.update');
    // Route::delete('/cart/items/{item}', [CartController::class, 'removeItem'])->name('cart.remove');
});


Route::get('/', [GuestController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductsController::class, 'index'])->name('dashboard');
    Route::get('/products/{slug}', [ProductsController::class, 'show'])->name('product.show');

    Route::prefix('cart/')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{product:slug}', [CartController::class, 'add'])->name('add');
        Route::delete('/remove/{product:slug}', [CartController::class, 'remove'])->name('remove');
        Route::patch('/update-quantity/{product:slug}', [CartController::class, 'updateQuantity'])->name('update-quantity');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
