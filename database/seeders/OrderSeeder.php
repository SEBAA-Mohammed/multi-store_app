<?php

namespace Database\Seeders;

use App\Models\Store;
use Carbon\Carbon;
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
        foreach (range(1, 100) as $i) {
            DB::table('orders')->insert([
                'is_paid' => fake()->boolean,
                'adresse_livraison' => fake()->text(),
                'payment_method_id' => fake()->numberBetween(1, 3),
                'user_id' => fake()->numberBetween(1, 3),
                'status_id' => fake()->numberBetween(1, 5),
                'store_id' => Store::where('slug', 'store-1')->first()->id,
                'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
