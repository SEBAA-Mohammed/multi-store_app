<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('order_details')->insert([
                'order_id' => $faker->numberBetween(1, 3),
                'product_id' => $faker->numberBetween(1, 3),
                'qte' => $faker->randomFloat(2, 1, 100),
                'prix_achat' => $faker->randomFloat(2, 0, 100),
                'tva_achat' => $faker->randomFloat(2, 0, 20),
            ]);
        }
    }
}
