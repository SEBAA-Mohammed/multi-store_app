<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            'qte' => $this->qte,
            'tva_achat' => $this->tva_achat,
            'prix_achat' => $this->prix_achat,
            // 'order' => $this->order,
            // 'product' => $this->product,
        ];
    }
}
