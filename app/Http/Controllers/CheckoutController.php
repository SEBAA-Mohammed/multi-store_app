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
        // $storeId = Store::where('slug', $request->route('store'))->first()->id;

        if ($request->query('status') === 'initialized') {
            // $order = Order::create([
            //     'adresse_livraison' => '',
            //     'is_paid' => false,
            //     'adresse_livraison' => '',
            //     'adresse_livraison' => '',

            //     // 'store_id' => $storeId,
            // ]);
        }
    }
}
