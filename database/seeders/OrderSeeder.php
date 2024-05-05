<?php

namespace Database\Seeders;

use App\Models\Store;
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

        foreach (range(1, 50) as $index) {
            DB::table('orders')->insert([
                'is_paid' => $faker->boolean,
                'adresse_livraison' => $faker->text(),
                'payment_method_id' => $faker->numberBetween(1, 3),
                'user_id' => $faker->numberBetween(1, 3),
                'status_id' => $faker->numberBetween(1, 5),
                'store_id' => Store::where('slug', 'store-1')->first()->id,
                'created_at' => $faker->dateTimeBetween(date('2024-01-01'), date('2024-12-30')),
            ]);
        }
    }
}
