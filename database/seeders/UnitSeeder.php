<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 3) as $index) {
            DB::table('units')->insert([
                'name' => $faker->word,
                'store_id' => Store::where('slug', 'store-1')->first()->id,

            ]);
        }
    }
}
