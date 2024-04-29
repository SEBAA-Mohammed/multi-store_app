<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class CustomersChart extends ChartWidget
{
    protected static ?string $heading = 'Customers Chart';

    protected static string $color = 'info';

    protected function getData(): array
    {
        $data = Trend::model(Order::class)
            // ->groupBy('user_id')
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count('user_id');

        return [
            'datasets' => [
                [
                    'label' => 'Number of customers',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }


    protected function getType(): string
    {
        return 'line';
    }
}
