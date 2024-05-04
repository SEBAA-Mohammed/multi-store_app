<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Store;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use App\Rules\UniqueStoreSlugPerUser;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\RegisterTenant;

class RegisterStore extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register store';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->debounce(500)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->rules([new UniqueStoreSlugPerUser(auth()->user())])
                    ->maxLength(255)
                    ->prefix(url('/') . '/' . auth()->user()->username . '/'),
                Select::make('store_category_id')
                    ->relationship(name: 'storeCategory', titleAttribute: 'name')
                    ->required()
            ]);
    }

    protected function handleRegistration(array $data): Store
    {
        $store = Store::create($data);

        $store->members()->attach(auth()->user());

        return $store;
    }
}
