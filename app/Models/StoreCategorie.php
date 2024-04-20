<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StoreCategorie extends Model
{
    use HasFactory;

    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
