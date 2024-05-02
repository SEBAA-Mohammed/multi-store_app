<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = Store::all();

        $categories = [
            ['name' => 'Vegetables', 'url' => 'https://www.healthyeating.org/images/default-source/home-0.0/nutrition-topics-2.0/general-nutrition-wellness/2-2-2-2foodgroups_vegetables_detailfeature.jpg?sfvrsn=226f1bc7_6'],
            ['name' => 'Fruits', 'url' => 'https://www.healthyeating.org/images/default-source/home-0.0/nutrition-topics-2.0/general-nutrition-wellness/2-2-2-3foodgroups_fruits_detailfeature.jpg?sfvrsn=64942d53_4'],
            ['name' => 'Clothes', 'url' => 'https://toronto.citynews.ca/wp-content/blogs.dir/sites/10/2020/05/21/rack-clothing-shopping-unsplash-1024x576.jpg'],
            ['name' => 'Shoes', 'url' => 'https://d1nymbkeomeoqg.cloudfront.net/photos/28/53/406866_25193_XXXL.webp'],
            ['name' => 'Electronics', 'url' => 'https://www.ept.ca/wp-content/uploads/2020/12/Screen-Shot-2020-12-10-at-10.48.19-AM.png'],
            ['name' => 'Books', 'url' => 'https://assets.teenvogue.com/photos/5e6bffbbdee1770008c6d9bd/16:9/w_1920,c_limit/GettyImages-577674005.jpg'],
            ['name' => 'Toys', 'url' => 'https://cdn.firstcry.com/education/2022/11/06094158/Toy-Names-For-Kids-696x476.jpg'],
            ['name' => 'Home Decor', 'url' => 'https://www.thespruce.com/thmb/ywHTET6XfU7pVy1KAMPfHS1QZZk=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/living-room-decor-ideas-5442837-hero-8b6e540e13f9457a84fe9f9e26ea2e5c.jpg'],
            ['name' => 'Sports Equipment', 'url' => 'https://clevercloset.co.uk/wp-content/uploads/2023/06/shutterstock_1562568346.jpg'],
            ['name' => 'Stationery', 'url' => 'https://cdn.24.co.za/files/Cms/General/d/4758/17e44d4bbae047bcbfa4929ca3b3d778.jpg'],
        ];

        foreach ($categories as $category) {
            $storeId = $category['name'] === 'Clothes' || $category['name'] === 'Shoes' || $category['name'] === 'Sports Equipment' ? $stores->first()->id : $stores->random()->id;


            DB::table('categories')->insert([
                'name' => $category['name'],
                'url' => $category['url'],
                'store_id' => $storeId
            ]);
        }
    }
}
