<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'datetime_order' => $this->datetime_order,
            'paid' => $this->paid,
            'adresse_livraison' => $this->adresse_livraison,
            // 'user' => $this->user,
            // 'payment_method' => $this->paymentMethod,
            // 'status' => $this->status,
        ];
    }
}
