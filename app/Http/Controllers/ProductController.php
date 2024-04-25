<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(User $user, Store $store, Product $product)
    {
        return inertia('Product', [
            'product' => new ProductResource($product)
        ]);

        // return response()->json([
        //     'products' => new ProductResource($store->products)
        // ]);
    }
}
