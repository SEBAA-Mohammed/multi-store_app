<?php

namespace App\Models;

use Illuminate\Support\Str;
use Filament\Models\Contracts\HasCurrentTenantLabel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model implements HasCurrentTenantLabel
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->id = Str::ulid();
        });
    }

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getCurrentTenantLabel(): string
    {
        return 'Current store';
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function storeCategory(): BelongsTo
    {
        return $this->belongsTo(StoreCategory::class);
    }

    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public static function getStoreUrl(): string
    {
        $slug = filament()->getTenant()?->slug;

        return $slug ? '/' . auth()->user()->username . '/' . $slug : '';
    }
}
