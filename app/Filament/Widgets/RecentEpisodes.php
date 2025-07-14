<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use App\Models\Episode;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class RecentEpisodes extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Episode::query()->with('anime')->latest()->limit(5)
            )
            ->columns([
                TextColumn::make('title')->label('Judul Episode')->searchable(),
                TextColumn::make('anime.title')->label('Anime')->sortable(),
                TextColumn::make('episode_number')->label('Episode')->sortable(),
            ]);
    }
}
