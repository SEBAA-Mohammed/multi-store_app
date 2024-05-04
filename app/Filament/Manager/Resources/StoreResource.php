<?php

namespace App\Filament\Manager\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Store;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ViewLink;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Manager\Resources\StoreResource\Pages;
use App\Filament\Manager\Resources\StoreResource\Pages\EditStore;
use App\Filament\Manager\Resources\StoreResource\Pages\ViewStore;
use App\Filament\Manager\Resources\StoreResource\Pages\ListStores;
use App\Filament\Manager\Resources\StoreResource\RelationManagers;
use App\Filament\Manager\Resources\StoreResource\Pages\CreateStore;
use Filament\Tables\Actions\Action;
use PhpParser\Node\Expr\AssignOp\Concat;

class StoreResource extends Resource
{
    protected static ?string $model = Store::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationGroup = 'َApp Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('members', 'name')
                    ->required()
                    ->hiddenOn('edit'),
                TextInput::make('name')
                    ->required(),
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
                TextInput::make('slug')
                    ->required(),
                Forms\Components\FileUpload::make('logo_url')
                    ->image()
                    ->required(),
                Forms\Components\FileUpload::make('billboard_url')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('logo_url')
                    ->label('Logo')
                    ->circular(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('tel')
                    ->searchable(),
                TextColumn::make('adresse')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('open_store')
                    ->label('Open Store')
                    ->url(
                        fn (Store $record): string =>
                        asset($record::getStoreUrl())
                    )
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStores::route('/'),
            'create' => CreateStore::route('/create'),
            'view' => ViewStore::route('/{record}'),
            'edit' => EditStore::route('/{record}/edit'),
        ];
    }
}
