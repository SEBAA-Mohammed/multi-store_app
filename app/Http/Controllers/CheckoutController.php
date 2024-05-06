<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Store;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $storeId = Store::where('slug', $request->route('store'))->first()->id;

        if ($request->query('status') === 'initialized') {
            Order::create([
                'adresse_livraison' => auth()->user()->adresse,
                'is_paid' => false,
                'payment_method_id' => 1,
                'status_id' => 1,
                'user_id' => auth()->user()->id,
                'store_id' => $storeId,
            ]);
        }

        if ($request->query('status') === 'completed') {
            Order::latest()->first()->update([
                'is_paid' => true,
                'payment_method_id' => 2,
                'status_id' => 5,
            ]);
        }

        if ($request->query('status') === 'failed') {
            Order::latest()->first()->update([
                'is_paid' => false,
                'payment_method_id' => 1,
                'status_id' => 4,
            ]);
        }
    }
}
