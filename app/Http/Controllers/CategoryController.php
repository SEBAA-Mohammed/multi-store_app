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
use App\Http\Resources\UnitResource;
use App\Models\Unit;
use Barryvdh\Debugbar\Facades\Debugbar;

class CategoryController extends Controller
{
    /**
     * Display the specified category.
     */
    public function show(User $user, Store $store, Category $category, Request $request)
    {
        $filters = [
            'brand_id' => $request->query('brand'),
            'unit_id' => $request->query('unit'),
        ];

        $products = $this->filterProducts($category, $filters);

        return inertia('Category', [
            'category' => new CategoryResource($category),
            'products' => ProductResource::collection($products),
            'brands' => BrandResource::collection($this->getBrands($category)),
            'units' => UnitResource::collection($this->getUnits($category))
        ]);
    }

    private function filterProducts(Category $category, array $filters)
    {
        $productsQuery = $category->products();

        foreach ($filters as $key => $value) {
            if ($value !== null) {
                $productsQuery->where($key, $value);
            }
        }

        return $productsQuery->get();
    }

    private function getBrands(Category $category)
    {
        // Get the brand IDs associated with the products of the category
        $brandIds = $category->products()->pluck('brand_id')->unique();

        // Get the brands based on the retrieved brand IDs
        return Brand::whereIn('id', $brandIds)->get();
    }

    private function getUnits(Category $category)
    {
        // Get the brand IDs associated with the products of the category
        $unitIds = $category->products()->pluck('unit_id')->unique();

        // Get the brands based on the retrieved brand IDs
        return Unit::whereIn('id', $unitIds)->get();
    }
}
