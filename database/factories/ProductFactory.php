<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
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
            'category_id' => $store->storeCategory->categories()->inRandomOrder()->first()->id,
            'brand_id' => Brand::factory()->forStore($store)->create()->id,
            'unit_id' => Unit::factory()->forStore($store)->create()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
