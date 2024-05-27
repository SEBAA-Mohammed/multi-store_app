<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\GeneratesFilePaths;

class Category extends Model
{
    use HasFactory, GeneratesFilePaths;

    protected $fillable = [
        'name',
        'url',
        'store_id'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
