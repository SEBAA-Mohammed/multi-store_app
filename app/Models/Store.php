<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Filament\Models\Contracts\HasCurrentTenantLabel;
use App\Traits\GeneratesFilePaths;

class Store extends Model implements HasCurrentTenantLabel
{
    use HasFactory, GeneratesFilePaths;

    protected $casts = [ 'id' => 'string' ];

    protected $keyType = 'string';

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->id = Str::ulid();
        });
    }

    protected $fillable = [
        'name',
        'slug',
        'billboard_url',
        'logo_url',
        'tel',
        'adresse',
        'header',
        'store_category_id',
        'user_id',
    ];

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

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public static function getStoreUrlForAdmin(): string
    {
        $slug = filament()->getTenant()?->slug;

        return $slug ? '/' . auth()->user()->username . '/' . $slug : '';
    }

    public static function getStoreUrlForManager(Store $store): string
    {
        $username = $store->members()->first()->username;

        return $store->slug ? '/' . $username . '/' . $store->slug : '';
    }
}
