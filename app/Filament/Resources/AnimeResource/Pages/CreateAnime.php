<?php

namespace App\Filament\Resources\AnimeResource\Pages;

use App\Filament\Resources\AnimeResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateAnime extends CreateRecord
{
    protected static string $resource = AnimeResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['title']);
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl();
    }
}
