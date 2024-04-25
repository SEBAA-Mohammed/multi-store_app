<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Resources\ProductResource;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Cursed routes
// Route::scopeBindings()->prefix('/{user:username}/{store:slug}')->group(function () {
//     Route::get('/', ProductController::class)->name('home');
//     Route::get('/cart', CartController::class)->name('cart');
// });

Route::get('/{user}/{store}', function (User $user, Store $store) {
    return inertia('Home', [
        'products' => ProductResource::collection($store->products)
    ]);
})->name('home');

Route::get('/{user}/{store}/cart', function (User $user, Store $store) {
    return inertia('Cart');
})->name('cart');

require __DIR__ . '/auth.php';
