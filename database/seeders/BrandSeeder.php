<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('brands')->insert([
                'name' => $faker->company,
                'image_url' => $faker->imageUrl(),
                'store_id' => Store::where('slug', 'store-1')->first()->id,
            ]);
        }
    }
}
