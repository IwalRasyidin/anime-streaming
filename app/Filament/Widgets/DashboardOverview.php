<?php

namespace App\Filament\Widgets;

use App\Models\Anime;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardOverview extends BaseWidget
{
    protected int|string|array $columnSpan = [
        'md' => 12,
        'default' => 12,
    ];

    protected function getStats(): array
    {
        return [
            Stat::make('Total Anime', Anime::count())
                ->description('Jumlah semua anime yang terdaftar')
                ->color('success'),

            Stat::make('Total Episodes', Episode::count())
                ->description('Jumlah episode dari seluruh anime')
                ->color('info'),

            Stat::make('Total Genres', Genre::count())
                ->description('Kategori genre anime')
                ->color('warning'),

            Stat::make('Total Users', User::count())
                ->description('Pengguna terdaftar')
                ->color('primary'),
        ];
    }
}
