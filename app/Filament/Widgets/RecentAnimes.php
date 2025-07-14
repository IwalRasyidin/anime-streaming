<?php

namespace App\Filament\Resources\AdminResource\Widgets;

use App\Models\Anime;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables\Columns\TextColumn;

class RecentAnimes extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Anime::query()->latest()->limit(5)
            )
            ->columns([
                TextColumn::make('title')->label('Title')->sortable()->searchable(),
                TextColumn::make('status')->label('Status'),
                TextColumn::make('release_date')->label('Release')->date(),
            ]);
    }
}
