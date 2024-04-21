<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        Store::insert([
            [
                'id' => Str::ulid(),
                'name' => 'Store 1',
                'slug' => 'store-1',
                'adresse' => 'adresse 1 example ...',
                'email' => 'email 1 example ...',
                'header' => 'header 1 example ...',
                'billboard_url' => $faker->imageUrl(),
                'logo_url' => $faker->imageUrl(),
                'tel' => '+212 762 416 046',
                'store_category_id' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::ulid(),
                'name' => 'Store 2',
                'slug' => 'store-2',
                'adresse' => 'adresse 2 example ...',
                'email' => 'email 2 example ...',
                'header' => 'header 2 example ...',
                'billboard_url' => $faker->imageUrl(),
                'logo_url' => $faker->imageUrl(),
                'tel' => '+212 762 416 046',
                'store_category_id' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::ulid(),
                'name' => 'Store 3',
                'slug' => 'store-3',
                'adresse' => 'adresse 3 example ...',
                'email' => 'email 3 example ...',
                'header' => 'header 3 example ...',
                'billboard_url' => $faker->imageUrl(),
                'logo_url' => $faker->imageUrl(),
                'tel' => '+212 762 416 046',
                'store_category_id' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::ulid(),
                'name' => 'Store 4',
                'slug' => 'store-4',
                'adresse' => 'adresse 4 example ...',
                'email' => 'email 4 example ...',
                'header' => 'header 4 example ...',
                'billboard_url' => $faker->imageUrl(),
                'logo_url' => $faker->imageUrl(),
                'tel' => '+212 762 416 046',
                'store_category_id' => $faker->numberBetween(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
