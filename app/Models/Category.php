<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_url',
        'store_categorie_id'
    ];


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function storeCategory(): BelongsTo
    {
        return $this->belongsTo(StoreCategory::class);
    }
}
