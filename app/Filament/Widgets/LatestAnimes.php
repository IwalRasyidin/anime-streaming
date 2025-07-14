<?php

namespace App\Filament\Widgets;

use App\Models\Anime;
use Filament\Widgets\Widget;

class LatestAnimes extends Widget
{
    protected static string $view = 'filament.widgets.latest-animes';

    // Set columnSpan jadi 1 agar bisa dibagi dua kolom
    protected int|string|array $columnSpan = ['md' => 2];

    protected function getViewData(): array
    {
        return [
            'animes' => Anime::with('genres')->latest()->take(5)->get(),
        ];
    }
}
