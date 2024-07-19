<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class CustomersChart extends ChartWidget
{
    protected static ?string $heading = 'Customers Chart';

    protected static string $color = 'primary';

    protected function getData(): array
    {

        $currentStore = filament()->getTenant()->id;

        $data = Order::query()
            ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(DISTINCT user_id) as count')
            ->where('store_id', $currentStore)
            ->groupBy('month')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Number of customers',
                    'data' => $data->pluck('count'),
                ],
            ],
            'labels' => $data->pluck('month'),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1, // Display only whole numbers
                    ],
                ],
            ],
        ];
    }

    {
        return 'bar';
    }
}
