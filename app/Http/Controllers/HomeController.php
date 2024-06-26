<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Store;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, Store $store)
    {
        return inertia('Home', [
            'products' => ProductResource::collection($store->products()->limit(4)->get())
        ]);
    }
}
