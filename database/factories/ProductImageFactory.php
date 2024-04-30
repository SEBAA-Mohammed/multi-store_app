<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => fake()->imageUrl(width: 1920, height: 1080, format: 'jpg'),
            // 'product_id' => Product::inRandomOrder()->first()->id,
        ];
    }

    /**
     * Indicate the product for the product image.
     *
     * @param  int  $productId
     * @return $this
     */
    public function forProduct(int $productId)
    {
        return $this->state(function () use ($productId) {
            return [
                'product_id' => $productId,
            ];
        });
    }
}
