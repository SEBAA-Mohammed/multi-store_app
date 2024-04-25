<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(User $user, Store $store, Product $product)
    {
        // Get the category ID of the current product
        $categoryId = $product->category->id;

        // Query suggested products that belong to the same category but exclude the current product
        $suggestedProducts = $store->products()
            ->where('category_id', $categoryId)
            ->where('id', '!=', $product->id)
            ->get();

        // dd($product->with('images')->get());
        return inertia('Product', [
            'product' => new ProductResource($product->load('images')),
            'suggestedProducts' => ProductResource::collection($suggestedProducts->load('images'))
        ]);

        // return response()->json([
        //     'products' => new ProductResource($store->products)
        // ]);
    }
}
