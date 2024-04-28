<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'name' => fake()->word(),
            'url' => fake()->imageUrl(width: 1920, height: 1080, format: 'jpg'),
            'store_category_id' => $store->storeCategory->id,
            'store_id' => $store->id
        ];
    }
}
