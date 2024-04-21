<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('categories')->insert([
                'nom' => $faker->word,
                'image_url' => $faker->imageUrl(),
                'store_category_id' => $faker->numberBetween(1, 3),
            ]);
        }
    }
}
