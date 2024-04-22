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
    public function index(User $user, Store $store)
    {
        $products = $store->products()->with('brand', 'category')->get();
        return ProductResource::collection($products);
    }
}
