<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Store;
use Filament\Forms\Form;
use Filament\Forms;

use Filament\Forms\Components\TextInput;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditStorePage extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Store settings';
    }

    public function form(Form $form): Form
    {
        $currentStore = filament()->getTenant()->id;

        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('tel')
                    ->required(),
                TextInput::make('adresse')
                    ->required(),
                Forms\Components\Select::make('store_category_id')
                    ->label('Category')
                    ->relationship('storeCategory', 'name')
                    ->required(),
                TextInput::make('header')
                    ->required(),
                TextInput::make('StoreUrl')
                    ->label('Your Store URL , Tap to copy')
                    ->url(fn (): string => $currentStore->getStoreUrlForAdmin()),
                // ->copyable()
                // ->copyMessage('Copied!'),
                TextInput::make('slug')
                    ->required(),
                Forms\Components\FileUpload::make('logo_url')
                    ->image(),
                Forms\Components\FileUpload::make('billboard_url')
                    ->image(),
            ]);
    }
}
