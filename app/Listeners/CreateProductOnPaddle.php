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
        $response = Http::withToken(env('PADDLE_API_KEY'))->post('https://sandbox-api.paddle.com/products', [
            'name' => $event->product->designation,
            'description' => $event->product->description,
            'tax_category' => 'standard',
            'type' => 'standard'
        ]);

        // Handle response and error checking
        $responseData = $response->json();
        if ($response->successful()) {
            // Product created successfully
            $productId = $responseData['data']['id'];

            Product::findOrFail($event->product->id)
                ->update(['paddle_product_id' => $productId]);
        } else {
            // Handle error
            dd($responseData['error']);
            $errorMessage = $responseData['error'];
        }
    }
}
