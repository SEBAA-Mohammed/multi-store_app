<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Store;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $stores = Store::all();

        $products = [
            [
                "title" => "Fjallraven - Foldsack No. 1 Backpack, Fits 15 Laptops",
                "price" => 109.95,
                "description" => "Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday",
            ],
            [
                "title" => "Mens Casual Premium Slim Fit T-Shirts",
                "price" => 22.3,
                "description" => "Slim-fitting style, contrast raglan long sleeve, three-button henley placket, light weight & soft fabric for breathable and comfortable wearing. And Solid stitched shirts with round neck made for durability and a great fit for casual fashion wear and diehard baseball fans. The Henley style round neckline includes a three-button placket.",
            ],
            [
                "title" => "Mens Cotton Jacket",
                "price" => 55.99,
                "description" => "great outerwear jackets for Spring/Autumn/Winter, suitable for many occasions, such as working, hiking, camping, mountain/rock climbing, cycling, traveling or other outdoors. Good gift choice for you or your family member. A warm hearted love to Father, husband or son in this thanksgiving or Christmas Day.",
            ],
            [
                "title" => "Mens Casual Slim Fit",
                "price" => 15.99,
                "description" => "The color could be slightly different between on the screen and in practice. / Please note that body builds vary by person, therefore, detailed size information should be reviewed below on the product description.",
            ],
            [
                "title" => "John Hardy Women's Legends Naga Gold & Silver Dragon Station Chain Bracelet",
                "price" => 695,
                "description" => "From our Legends Collection, the Naga was inspired by the mythical water dragon that protects the ocean's pearl. Wear facing inward to be bestowed with love and abundance, or outward for protection.",
            ],
            [
                "title" => "Solid Gold Petite Micropave",
                "price" => 168,
                "description" => "Satisfaction Guaranteed. Return or exchange any order within 30 days.Designed and sold by Hafeez Center in the United States. Satisfaction Guaranteed. Return or exchange any order within 30 days.",
            ],
            [
                "title" => "White Gold Plated Princess",
                "price" => 9.99,
                "description" => "Classic Created Wedding Engagement Solitaire Diamond Promise Ring for Her. Gifts to spoil your love more for Engagement, Wedding, Anniversary, Valentine's Day...",
            ],
            [
                "title" => "Pierced Owl Rose Gold Plated Stainless Steel Double",
                "price" => 10.99,
                "description" => "Rose Gold Plated Double Flared Tunnel Plug Earrings. Made of 316L Stainless Steel",
            ],
            [
                "title" => "BIYLACLESEN Women's 3-in-1 Snowboard Jacket Winter Coats",
                "price" => 56.99,
                "description" => "Note:The Jackets is US standard size, Please choose size as your usual wear Material: 100% Polyester; Detachable Liner Fabric: Warm Fleece. Detachable Functional Liner: Skin Friendly, Lightweigt and Warm.Stand Collar Liner jacket, keep you warm in cold weather. Zippered Pockets: 2 Zippered Hand Pockets, 2 Zippered Pockets on Chest (enough to keep cards or keys)and 1 Hidden Pocket Inside.Zippered Hand Pockets and Hidden Pocket keep your things secure. Humanized Design: Adjustable and Detachable Hood and Adjustable cuff to prevent the wind and water,for a comfortable fit. 3 in 1 Detachable Design provide more convenience, you can separate the coat and inner as needed, or wear it together. It is suitable for different season and help you adapt to different climates",
            ],
            [
                "title" => "Lock and Love Women's Removable Hooded Faux Leather Moto Biker Jacket",
                "price" => 29.95,
                "description" => "100% POLYURETHANE(shell) 100% POLYESTER(lining) 75% POLYESTER 25% COTTON (SWEATER), Faux leather material for style and comfort / 2 pockets of front, 2-For-One Hooded denim style faux leather jacket, Button detail on waist / Detail stitching at sides, HAND WASH ONLY / DO NOT BLEACH / LINE DRY / DO NOT IRON",
            ],

        ];

        foreach ($products as $productData) {
            $product = new Product([
                'barcode' => $faker->ean13(),
                'designation' => $productData['title'],
                'prix_ht' => $productData['price'],
                'tva' => $faker->randomFloat(2, 0.2, 0.5),
                'description' => $productData['description'],
                'stock' => $faker->numberBetween(0, 5000),
                'rating' => $faker->randomFloat(2, 1, 5),
                'store_id' => $stores->first()->id,
                'category_id' => $faker->randomElement([4, 9, 3]),
                'brand_id' => $faker->randomElement([1, 2, 3]),
                'unit_id' => $faker->randomElement([1, 2, 3]),
            ]);

            $product->save();
        }
    }
}
