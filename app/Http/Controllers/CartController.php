<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Inertia\Inertia;

class CartController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, Store $store)
    {
        return inertia('Cart');
    }
}
