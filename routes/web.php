<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::scopeBindings()->prefix('/{user}/{store}')->group(function () {
    Route::get('/', HomeController::class)->name('home');

    Route::get('/product/{product}', ProductController::class)->name('product');

    Route::get('/category/{category}', CategoryController::class)->name('category');

    Route::get('/cart', CartController::class)->name('cart');

    Route::get('/checkout', CheckoutController::class)->name('checkout');
});

require __DIR__ . '/auth.php';
