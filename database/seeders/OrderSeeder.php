<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('orders')->insert([
                'datetime_order' => $faker->dateTime(),
                'paid' => $faker->boolean,
                'adresse_livraison' => $faker->text(),
                'payment_method_id' => $faker->numberBetween(1, 3),
                'user_id' => $faker->numberBetween(1, 3),
                'status_id' => $faker->numberBetween(1, 3),
            ]);
        }
    }
}
