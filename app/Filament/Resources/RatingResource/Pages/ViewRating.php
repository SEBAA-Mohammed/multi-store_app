<?php

namespace App\Filament\Resources\RatingResource\Pages;

use App\Filament\Resources\RatingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRating extends ViewRecord
{
    protected static string $resource = RatingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
