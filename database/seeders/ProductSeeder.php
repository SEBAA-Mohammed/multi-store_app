<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Store;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        Product::insert([
            [
                'barcode' => '123456789',
                'designation' => 'Product 1',
                'prix_ht' => 10.99,
                'tva' => 0.10,
                'description' => 'Description for Product 1',
                'stock' => 100,
                'store_id' => Store::where('slug', 'store-1')->first()->id,
                'brand_id' => $faker->numberBetween(1, 3),
                'unit_id' => $faker->numberBetween(1, 3),
                'category_id' => $faker->numberBetween(1, 3),
                'rating' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barcode' => '987654321',
                'designation' => 'Product 2',
                'prix_ht' => 19.99,
                'tva' => 0.10,
                'description' => 'Description for Product 2',
                'stock' => 150,
                'store_id' => Store::where('slug', 'store-1')->first()->id,
                'brand_id' => $faker->numberBetween(1, 3),
                'unit_id' => $faker->numberBetween(1, 3),
                'category_id' => $faker->numberBetween(1, 3),
                'rating' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barcode' => '456789123',
                'designation' => 'Product 3',
                'prix_ht' => 15.50,
                'tva' => 0.10,
                'description' => 'Description for Product 3',
                'stock' => 80,
                'store_id' => Store::where('slug', 'store-2')->first()->id,
                'brand_id' => $faker->numberBetween(1, 3),
                'unit_id' => $faker->numberBetween(1, 3),
                'category_id' => $faker->numberBetween(1, 3),
                'rating' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barcode' => '789123456',
                'designation' => 'Product 4',
                'prix_ht' => 25.75,
                'tva' => 0.20,
                'description' => 'Description for Product 4',
                'stock' => 200,
                'store_id' => Store::where('slug', 'store-2')->first()->id,
                'brand_id' => $faker->numberBetween(1, 3),
                'unit_id' => $faker->numberBetween(1, 3),
                'category_id' => $faker->numberBetween(1, 3),
                'rating' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barcode' => '654321987',
                'designation' => 'Product 5',
                'prix_ht' => 8.25,
                'tva' => 0.20,
                'description' => 'Description for Product 5',
                'quantite' => 120,
                'store_id' => Store::where('slug', 'store-3')->first()->id,
                'brand_id' => $faker->numberBetween(1, 3),
                'unit_id' => $faker->numberBetween(1, 3),
                'category_id' => $faker->numberBetween(1, 3),
                'rating' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barcode' => '111111111',
                'designation' => 'Product 6',
                'prix_ht' => 12.99,
                'tva' => 0.10,
                'description' => 'Description for Product 6',
                'stock' => 90,
                'store_id' => Store::where('slug', 'store-3')->first()->id,
                'brand_id' => $faker->numberBetween(1, 3),
                'unit_id' => $faker->numberBetween(1, 3),
                'category_id' => $faker->numberBetween(1, 3),
                'rating' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barcode' => '222222222',
                'designation' => 'Product 7',
                'prix_ht' => 9.75,
                'tva' => 0.10,
                'description' => 'Description for Product 7',
                'stock' => 180,
                'store_id' => Store::where('slug', 'store-4')->first()->id,
                'brand_id' => $faker->numberBetween(1, 3),
                'unit_id' => $faker->numberBetween(1, 3),
                'category_id' => $faker->numberBetween(1, 3),
                'rating' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barcode' => '333333333',
                'designation' => 'Product 8',
                'prix_ht' => 17.50,
                'tva' => 0.10,
                'description' => 'Description for Product 8',
                'stock' => 150,
                'store_id' => Store::where('slug', 'store-4')->first()->id,
                'brand_id' => $faker->numberBetween(1, 3),
                'unit_id' => $faker->numberBetween(1, 3),
                'category_id' => $faker->numberBetween(1, 3),
                'rating' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
