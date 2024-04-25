<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'barcode' => $this->barcode,
            'designation' => $this->designation,
            'prix_ht' => $this->prix_ht,
            'tva' => $this->tva,
            'description' => $this->description,
            'stock' => $this->stock,
            'rating' => $this->rating,
            'images' => ProductImageResource::collection($this->whenLoaded('images')),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'brand' => new BrandResource($this->whenLoaded('brand')),
            'unit' => new UnitResource($this->whenLoaded('unit')),
            'store' => new StoreResource($this->whenLoaded('store')),
        ];
    }
}
