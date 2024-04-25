<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection as Collection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(User $user, Store $store, Product $product)
    {
        return inertia('Product', [
            'product' => new ProductResource($product->load('images')),
            'suggestedProducts' => $this->getSuggestedProducts($store, $product)
        ]);
    }

    /**
     * Query the suggested products that belong to the same category.
     */
    private function getSuggestedProducts(Store $store, Product $product): Collection
    {
        // Get the category ID of the current product
        $categoryId = $product->category->id;

        // Exclude the current product
        $suggestedProducts = $store->products()
            ->where('category_id', $categoryId)
            ->whereNot('id', $product->id)
            ->get();

        return ProductResource::collection($suggestedProducts->load('images'));
    }
}
