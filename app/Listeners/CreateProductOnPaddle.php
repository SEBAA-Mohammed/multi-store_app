<?php

namespace App\Listeners;

use App\Events\ProductAdded;
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
            'name' => $event->designation,
            'description' => $event->description,
            'tax_category' => 'digital-goods',
            'type' => 'standard'
        ]);

        // Handle response and error checking
        $responseData = $response->json();
        if ($response->successful()) {
            // Product created successfully
            $productId = $responseData['product_id'];
            // Sync product with Laravel Cashier
            // Example: $product = $user->newSubscription('default', $productId)->createAsPaddleProduct();
        } else {
            // Handle error
            $errorMessage = $responseData['error'];
        }
    }
}
