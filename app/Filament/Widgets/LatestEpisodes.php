<?php

namespace App\Filament\Widgets;

use App\Models\Episode;
use Filament\Widgets\Widget;

class LatestEpisodes extends Widget
{
    protected static string $view = 'filament.widgets.latest-episodes';

    // Sama, atur columnSpan ke 1
    protected int|string|array $columnSpan = ['md' => 9];

    protected function getViewData(): array
    {
        return [
            'episodes' => Episode::with('anime')->latest()->take(5)->get(),
        ];
    }
}
