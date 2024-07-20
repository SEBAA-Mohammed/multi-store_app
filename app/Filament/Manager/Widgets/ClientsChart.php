<?php

namespace App\Filament\Manager\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class ClientsChart extends ChartWidget
{
    protected static ?string $heading = 'Clients Chart';

    protected static string $color = 'primary';

    protected static ?string $pollingInterval = '60s';

    protected function getData(): array
    {
        $currentYear = now()->year;
        $months = collect(range(1, 12))->map(function ($month) use ($currentYear) {
            return [
                'month' => str_pad($month, 2, '0', STR_PAD_LEFT),
                'year' => $currentYear,
                'count' => 0,
            ];
        });

        $data = User::query()
            ->where('role', 'client')
            ->selectRaw('DATE_FORMAT(created_at, "%m") as month, COUNT(id) as count')
            ->whereYear('created_at', $currentYear)
            ->groupBy('month')
            ->get();

        $months->transform(function ($item) use ($data) {
            $monthData = $data->firstWhere('month', $item['month']);
            if ($monthData) {
                $item['count'] = $monthData->count;
            }
            return $item;
        });

        return [
            'datasets' => [
                [
                    'label' => 'Number of Clients created',
                    'data' => $months->pluck('count'),
                ],
            ],
            'labels' => $months->map(function ($month) {
                return "{$month['year']}-{$month['month']}";
            }),
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




    protected function getType(): string
    {
        return 'bar';
    }
}
