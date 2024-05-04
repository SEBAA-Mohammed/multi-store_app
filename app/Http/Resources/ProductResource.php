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
            'price' => $this->getPriceTTC(),
            'description' => $this->description,
            'stock' => $this->stock,
            'rating' => $this->rating,
            'product_id' => $this->paddle_product_id,
            'price_id' => $this->paddle_price_id,
            'images' => ProductImageResource::collection($this->images),
            'category' => new CategoryResource($this->category),
            'brand' => new BrandResource($this->brand),
            'unit' => new UnitResource($this->unit),
            'store' => new StoreResource($this->whenLoaded('store')),
        ];
    }
}
