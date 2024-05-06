<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $url = $this->url;

        if (!str_starts_with($url, 'https://fakestoreapi.com/img')) {
            $url = 'http://localhost:8000/storage/' . $url;
        }

        return [
            'id' => $this->id,
            'url' => $url,
        ];
    }
}
