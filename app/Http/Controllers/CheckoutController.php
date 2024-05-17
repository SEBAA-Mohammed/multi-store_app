<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $store = Store::where('slug', $request->route('store'))->firstOrFail();

        if (!in_array($request->query('status'), ['initialized', 'completed', 'failed'])) {
            abort(400, 'Invalid status.');
        }

        DB::beginTransaction();

        try {
            switch ($request->query('status')) {
                case 'initialized':
                    $this->createOrder($store);
                    break;
                case 'completed':
                    $this->completeOrder();
                    break;
                case 'failed':
                    $this->failOrder();
                    break;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }

    protected function createOrder(Store $store)
    {
        Order::create([
            'adresse_livraison' => auth()->user()->adresse,
            'is_paid' => false,
            'payment_method_id' => 1,
            'status_id' => 1,
            'user_id' => auth()->id(),
            'store_id' => $store->id,
        ]);
    }

    protected function completeOrder()
    {
        $order = Order::latest()->first();
        $order->update([
            'is_paid' => true,
            'payment_method_id' => 2,
            'status_id' => 5,
        ]);
    }

    protected function failOrder()
    {
        $order = Order::latest()->first();
        $order->update([
            'is_paid' => false,
            'payment_method_id' => 1,
            'status_id' => 4,
        ]);
    }
}
