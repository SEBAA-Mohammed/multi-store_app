<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\GeneratesFilePaths;

class ProductImage extends Model
{
    use HasFactory, GeneratesFilePaths;

    protected $fillable = [
        'product_id',
        'url'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
