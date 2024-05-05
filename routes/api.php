<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/{user:username}/{store:slug}', function (User $user, Store $store) {
//     return response()->json(['products' => $store->products]);
// });

// Route::scopeBindings()->prefix('/{user}/{store}')->group(function () {
//     Route::get('/checkout', CheckoutController::class)->name('checkout');
// });
