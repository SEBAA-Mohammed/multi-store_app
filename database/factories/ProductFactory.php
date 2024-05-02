<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $store = Store::inRandomOrder()->first();

        return [
            'barcode' => fake()->isbn13(),
            'designation' => fake()->word(),
            'prix_ht' => fake()->randomFloat(nbMaxDecimals: 2, min: 5, max: 6000),
            'tva' => fake()->randomFloat(nbMaxDecimals: 2, min: 0, max: 1),
            'description' => fake()->paragraph(8),
            'stock' => fake()->numberBetween(0, 5000),
            'rating' => fake()->numberBetween(1, 5),
            'store_id' => $store->id,
            'category_id' => $store->categories()->inRandomOrder()->first()->id ?? null,
            'brand_id' => $store->brands()->inRandomOrder()->first()->id ?? null,
            'unit_id' => $store->units()->inRandomOrder()->first()->id ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function ($product) {
            ProductImageFactory::times(4)->forProduct($product->id)->create();
        });
    }
}
