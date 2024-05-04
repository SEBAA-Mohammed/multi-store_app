<?php

namespace App\Listeners;

use App\Events\ProductAdded;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateProductOnPaddle
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductAdded $event): void
    {
        // Create product
        $responseProduct = Http::withToken(env('PADDLE_API_KEY'))
            ->post('https://sandbox-api.paddle.com/products', [
                'name' => $event->product->designation,
                'description' => $event->product->description,
                'tax_category' => 'standard',
                'type' => 'standard'
            ]);

        $responseDataProduct = $responseProduct->json();
        if ($responseProduct->successful()) {
            $productId = $responseDataProduct['data']['id'];

            Product::findOrFail($event->product->id)
                ->update(['paddle_product_id' => $productId]);

            // Create price
            $responsePrice = Http::withToken(env('PADDLE_API_KEY'))
                ->post('https://sandbox-api.paddle.com/prices', [
                    'description' => $event->product->description,
                    'product_id' => $productId,
                    'unit_price' => [
                        'amount' => (string) $event->product->getPriceTTC(),
                        'currency_code' => 'USD'
                    ],
                    'quantity' => [
                        'minimum' => 1,
                        'maximum' => (int) $event->product->stock
                    ],
                    'type' => 'standard'
                ]);

            $responseDataPrice = $responsePrice->json();
            if ($responsePrice->successful()) {
                $priceId = $responseDataPrice['data']['id'];

                Product::findOrFail($event->product->id)
                    ->update(['paddle_price_id' => $priceId]);
            } else {
                // Handle error
                dd($responseDataPrice['error']);
                $errorMessage = $responseDataPrice['error'];
            }
        } else {
            // Handle error
            dd($responseDataProduct['error']);
            $errorMessage = $responseDataProduct['error'];
        }
    }
}
