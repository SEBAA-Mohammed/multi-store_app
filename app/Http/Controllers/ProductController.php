<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Store;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(User $user, Store $store)
    {
        return inertia('Home/Index', [
            'products' => ProductResource::collection($store->products)
        ]);

        // return response()->json([
        //     'products' => ProductResource::collection($store->products)
        // ]);
    }
}
