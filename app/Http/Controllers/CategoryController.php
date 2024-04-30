<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\BrandResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\CategoryResource;
use Barryvdh\Debugbar\Facades\Debugbar;

class CategoryController extends Controller
{
    /**
     * Display the specified category.
     */
    public function show(User $user, Store $store, Category $category, Request $request)
    {
        Debugbar::info($request->query());
        return inertia('Category', [
            'category' => new CategoryResource($category),
            'products' => ProductResource::collection($category->products),
            'brands' => BrandResource::collection($this->getBrands($category)),
            'units' => [] // UnitResource::collection(),
        ]);
    }

    private function getBrands(Category $category)
    {
        // Get the brand IDs associated with the products of the category
        $brandIds = $category->products()->pluck('brand_id')->unique();

        // Get the brands based on the retrieved brand IDs
        return Brand::whereIn('id', $brandIds)->get();
    }
}
