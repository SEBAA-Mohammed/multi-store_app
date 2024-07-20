<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\StoreCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::insert([
            [
                'id' => Str::ulid(),
                'name' => 'Store 1',
                'slug' => 'store-1',
                'adresse' => 'adresse 1 example ...',
                'email' => 'email 1 example ...',
                'header' => 'Step onto the field and stand out from the crowd with these ',
                'billboard_url' => 'https://i0.wp.com/grapevine.is/wp-content/uploads/2020/05/66north_by_bicnick.jpg?fit=1000%2C667&quality=99&ssl=1',
                'logo_url' => 'https://assets.asosservices.com/sitechromepublisher/oneTrust/12.1.0-08d71e35-55/consent/908f7fca-dbc5-4b3a-8f6b-ed734de0cb52/018f60e2-baa7-70ca-8527-5f3259c09090/logos/static/ot_company_logo.png',
                'tel' => '+212 762 416 046',
                'store_category_id' => StoreCategory::inRandomOrder()->first()->id,
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
                'billboard_url' => fake()->imageUrl(width: 1920, height: 1080, format: 'jpg'),
                'logo_url' => fake()->imageUrl(),
                'tel' => '+212 762 416 046',
                'store_category_id' => StoreCategory::inRandomOrder()->first()->id,
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
                'billboard_url' => fake()->imageUrl(width: 1920, height: 1080, format: 'jpg'),
                'logo_url' => fake()->imageUrl(),
                'tel' => '+212 762 416 046',
                'store_category_id' => StoreCategory::inRandomOrder()->first()->id,
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
                'billboard_url' => fake()->imageUrl(width: 1920, height: 1080, format: 'jpg'),
                'logo_url' => fake()->imageUrl(),
                'tel' => '+212 762 416 046',
                'store_category_id' => StoreCategory::inRandomOrder()->first()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
