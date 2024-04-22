<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'billboard_url' => $this->billboard_url,
            'logo_url' => $this->logo_url,
            'email' => $this->email,
            'tel' => $this->tel,
            'adresse' => $this->adresse,
            'header' => $this->header,
        ];
    }
}
