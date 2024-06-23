<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [GuestController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductsController::class, 'index'])->name('dashboard');
    Route::get('/products/{slug}', [ProductsController::class, 'show'])->name('product.show');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/items', [CartController::class, 'store'])->name('cart.store');
    Route::patch('/cart/items/{item}', [CartController::class, 'updateItem'])->name('cart.update');
    Route::delete('/cart/items/{item}', [CartController::class, 'removeItem'])->name('cart.remove');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
