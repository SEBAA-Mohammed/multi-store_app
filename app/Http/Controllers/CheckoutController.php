<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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

        // Fetch the latest transaction
        $response = Http::withToken(config('services.paddle.api_key'))->get('https://sandbox-api.paddle.com/transactions?order_by=created_at[DESC]');

        if ($response->successful()) {
            $transactions = $response->collect()->first();
            if (!empty($transactions) && is_array($transactions)) {
                $transaction = $transactions[0];

                // Debugging: Log the transaction to check its structure
                Log::debug('Paddle Transaction:', $transaction);

                // Ensure the required fields are present
                if (isset($transaction['id'], $transaction['invoice_id'])) {
                    sleep(2);

                    $order = Order::orderBy('id', 'desc')->first();

                    // Check if order exists before updating
                    if ($order) {
                        $order->update([
                            'is_paid' => true,
                            'payment_method_id' => 2,
                            'status_id' => 5,
                        ]);

                        // Create OrderDetail
                        OrderDetail::create([
                            'qte' => count($transaction['items']),
                            'tva_achat' => $transaction['items'][0]['price']['custom_data']['tva'],
                            'prix_achat' => (int) round($transaction['details']['totals']['total'], 2),
                            'paddle_transaction_id' => $transaction['id'],
                            'paddle_invoice_id' => $transaction['invoice_id'],
                            'order_id' => $order->id, // Dynamically set the order ID
                            'product_id' => 5, // Assuming static product ID, adjust as necessary
                        ]);
                    } else {
                        Log::error('No order found to update.');
                    }
                } else {
                    Log::error('Transaction ID or Invoice ID is missing in the response.');
                }
            } else {
                Log::error('Transactions array is empty or invalid.');
            }
        } else {
            Log::error('Failed to fetch transactions from Paddle API.');
        }
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
