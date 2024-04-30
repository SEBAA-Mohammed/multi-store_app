<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\OrderResource as ResourcesOrderResource;
use App\Filament\Resources\Shop\OrderResource;
use App\Models\Order as ModelsOrder;
use App\Models\Shop\Order;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Squire\Models\Currency;

class LatestOrders extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(ResourcesOrderResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Order Date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_paid')
                    ->boolean()
                    ->label('Paid'),
                Tables\Columns\TextColumn::make('status.name')
                    ->badge(),
            ])
            ->actions([
                Tables\Actions\Action::make('open')
                    ->url(fn (ModelsOrder $record): string => ResourcesOrderResource::getUrl('view', ['record' => $record])),
            ]);
    }
}
