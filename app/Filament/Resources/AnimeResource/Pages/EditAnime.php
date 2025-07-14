<?php

namespace App\Filament\Resources\AnimeResource\Pages;

use App\Filament\Resources\AnimeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditAnime extends EditRecord
{
    protected static string $resource = AnimeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['slug'] = Str::slug($data['title']);
        return $data;
    }
}
