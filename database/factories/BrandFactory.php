<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'image_url' => fake()->imageUrl(width: 512, height: 512, format: 'png'),
            'store_id' => fake()->randomElement(Store::pluck('id')),
            // 'store_id' => Store::inRandomOrder()->first()->id
        ];
    }

    /**
     * Indicate the store for the brand.
     *
     * @param  \App\Models\Store  $store
     * @return $this
     */
    public function forStore(Store $store)
    {
        return $this->state(function () use ($store) {
            return [
                'store_id' => $store->id,
            ];
        });
    }
}
