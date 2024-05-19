<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Models\OrderDetail;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('edit')
                ->label('Download Invoice')
                ->url(function () {
                    $orderDetail = OrderDetail::where('order_id', $this->record->id)->first();

                    if (!$orderDetail || $orderDetail->paddle_transaction_id === null) {
                        return;
                    }

                    $invoicePdf = Http::withToken(config('services.paddle.api_key'))->get("https://sandbox-api.paddle.com/transactions/{$orderDetail->paddle_transaction_id}/invoice")['data']['url'];

                    return $invoicePdf;
                })->visible(OrderDetail::where('order_id', $this->record->id)->whereNotNull('paddle_transaction_id')->exists()),

            Actions\EditAction::make(),
        ];
    }
}
