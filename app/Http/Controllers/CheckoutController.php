<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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
        sleep(2);

        $transaction = Http::withToken(config('services.paddle.api_key'))->get('https://sandbox-api.paddle.com/transactions?order_by=created_at[DESC]')->collect()->first()[0];

        sleep(2);

        Order::orderBy('id', 'desc')->first()->update([
            'is_paid' => true,
            'payment_method_id' => 2,
            'status_id' => 5,
        ]);

        OrderDetail::create([
            'qte' => count($transaction['items']),
            'tva_achat' => $transaction['items'][0]['price']['custom_data']['tva'],
            'prix_achat' => $transaction['details']['totals']['total'],
            'paddle_transaction_id' => $transaction['id'],
            'paddle_invoice_id' => $transaction['invoice_id'],
            'order_id' => 5,
            'product_id' => 5,
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
