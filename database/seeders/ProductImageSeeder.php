<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $images = [
            "https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg",
            "https://fakestoreapi.com/img/71-3HjGNDUL._AC_SY879._SX._UX._SY._UY_.jpg",
            "https://fakestoreapi.com/img/71li-ujtlUL._AC_UX679_.jpg",
            "https://fakestoreapi.com/img/71YXzeOuslL._AC_UY879_.jpg",
            "https://fakestoreapi.com/img/51Y5NI-I5jL._AC_UX679_.jpg",
            "https://fakestoreapi.com/img/81XH0e8fefL._AC_UY879_.jpg",
            "https://fakestoreapi.com/img/71HblAHs5xL._AC_UY879_-2.jpg",
            "https://fakestoreapi.com/img/71z3kpMAYsL._AC_UY879_.jpg",
            "https://fakestoreapi.com/img/51eg55uWmdL._AC_UX679_.jpg",
            "https://fakestoreapi.com/img/61pHAEJ4NML._AC_UX679_.jpg",
            "https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg",
            "https://fakestoreapi.com/img/71-3HjGNDUL._AC_SY879._SX._UX._SY._UY_.jpg",
            "https://fakestoreapi.com/img/71li-ujtlUL._AC_UX679_.jpg",
            "https://fakestoreapi.com/img/71YXzeOuslL._AC_UY879_.jpg",
            "https://fakestoreapi.com/img/51Y5NI-I5jL._AC_UX679_.jpg",
            "https://fakestoreapi.com/img/81XH0e8fefL._AC_UY879_.jpg",
            "https://fakestoreapi.com/img/71HblAHs5xL._AC_UY879_-2.jpg",
            "https://fakestoreapi.com/img/71z3kpMAYsL._AC_UY879_.jpg",
            "https://fakestoreapi.com/img/51eg55uWmdL._AC_UX679_.jpg",
            "https://fakestoreapi.com/img/61pHAEJ4NML._AC_UX679_.jpg",
            "https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg",
            "https://fakestoreapi.com/img/71-3HjGNDUL._AC_SY879._SX._UX._SY._UY_.jpg",
            "https://fakestoreapi.com/img/71li-ujtlUL._AC_UX679_.jpg",
            "https://fakestoreapi.com/img/71YXzeOuslL._AC_UY879_.jpg",
            "https://fakestoreapi.com/img/51Y5NI-I5jL._AC_UX679_.jpg",
            "https://fakestoreapi.com/img/81XH0e8fefL._AC_UY879_.jpg",
            "https://fakestoreapi.com/img/71HblAHs5xL._AC_UY879_-2.jpg",
            "https://fakestoreapi.com/img/71z3kpMAYsL._AC_UY879_.jpg",
            "https://fakestoreapi.com/img/51eg55uWmdL._AC_UX679_.jpg",
            "https://fakestoreapi.com/img/61pHAEJ4NML._AC_UX679_.jpg",

        ];

        foreach ($images as $url) {
            ProductImage::create([
                'url' => $url,
                'product_id' => rand(1, 10)
            ]);
        }
    }
}
