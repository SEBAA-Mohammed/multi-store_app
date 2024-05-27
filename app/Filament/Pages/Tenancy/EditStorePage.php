<?php

namespace App\Filament\Pages\Tenancy;

use Filament\Pages\Tenancy\EditTenantProfile;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms;

class EditStorePage extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Store settings';
    }

    public function form(Form $form): Form
    {
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
                Forms\Components\FileUpload::make('logo_url')
                    ->image(),
                Forms\Components\FileUpload::make('billboard_url')
                    ->image(),
            ]);
    }
}
