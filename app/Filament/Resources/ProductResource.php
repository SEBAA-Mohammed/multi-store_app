<?php

namespace App\Filament\Resources;

use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Repeater;
use Filament\Forms;
use App\Models\Product;
use App\Filament\Resources\ProductResource\Pages;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationGroup = 'Store Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        $currentStore = filament()->getTenant()->id;

        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->label('Category')
                            ->relationship('category', 'name', modifyQueryUsing: fn (Builder $query) => $query->where('store_id', '=', $currentStore))
                            ->required(),
                        Forms\Components\Select::make('brand_id')
                            ->label('Brand')
                            ->relationship('brand', 'name', modifyQueryUsing: fn (Builder $query) => $query->where('store_id', '=', $currentStore))
                            ->required(),
                        Forms\Components\Select::make('unit_id')
                            ->label('Unit')
                            ->relationship('unit', 'name', modifyQueryUsing: fn (Builder $query) => $query->where('store_id', '=', $currentStore))
                            ->required()
                    ])->columns(3),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('barcode')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('designation')
                            ->required(),
                    ])->columns(2),
                Forms\Components\Section::make()
                    ->schema([
                        TextInput::make('prix_ht')
                            ->required()
                            ->numeric()
                            ->inputMode('decimal'),
                        TextInput::make('tva')
                            ->required()
                            ->numeric()
                            ->inputMode('decimal')
                            ->minValue(0.2)
                            ->maxValue(0.8)
                    ])->columns(2),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('stock')
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('rating')
                            ->default(5)
                            ->required()
                            ->hidden()
                            ->numeric()
                            ->inputMode('decimal'),
                    ]),
                Forms\Components\Section::make('Product Images')
                    ->schema([
                        static::getImagesRepeater(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('designation')
                    ->searchable()
                    ->limit(20),
                Tables\Columns\TextColumn::make('prix_ht')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tva')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->numeric(),
                Tables\Columns\TextColumn::make('unit.name')
                    ->numeric(),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getImagesRepeater(): Repeater
    {
        return Repeater::make('images')
            ->relationship()
            ->schema([
                Forms\Components\FileUpload::make('url')
                    ->image()
                    ->required(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
