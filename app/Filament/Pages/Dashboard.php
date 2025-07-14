<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\DashboardOverview;
use App\Filament\Widgets\LatestAnimes;
use App\Filament\Widgets\LatestEpisodes;

class Dashboard extends BaseDashboard
{
    // ❌ Jangan static
    protected function getHeaderWidgets(): array
    {
        return [
            DashboardOverview::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            LatestAnimes::class,
            LatestEpisodes::class,
        ];
    }

    // ✅ Harus public (bukan protected)
    public function getFooterWidgetsColumns(): int|array
    {
        return [
            'default' => 1,
            'md' => 2, // 2 kolom saat medium ke atas
        ];
    }
}
