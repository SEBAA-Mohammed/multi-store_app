<?php

namespace Database\Seeders;

use App\Models\StoreCategory;
use Illuminate\Database\Seeder;

class StoreCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eCommerceTypes = [
            "Clothing and Fashion",
            "Electronics and Gadgets",
            "Books and Literature",
            "Home and Furniture",
            "Health and Beauty",
            "Sports and Outdoor Equipment",
            "Toys and Games",
            "Automotive Parts and Accessories",
            "Food and Grocery",
            "Jewelry and Accessories",
            "Pet Supplies",
            "Arts and Crafts",
            "Baby and Kids Products",
            "Office Supplies",
            "Travel and Luggage",
            "Musical Instruments",
            "Gardening and Outdoor Decor",
            "Collectibles and Memorabilia",
            "Digital Products and Services",
            "Handmade and Artisanal Goods"
        ];

        foreach ($eCommerceTypes as $type) {
            StoreCategory::create([
                'name' => $type
            ]);
        }
    }
}
