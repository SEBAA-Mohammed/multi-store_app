<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $order = Order::create([
        //     'cart_id' => $cart->id,
        //     'price_ids' => $cart->price_ids,
        //     'status' => 1,
        // ]);

        dd($request->query('status'));
    }
}
