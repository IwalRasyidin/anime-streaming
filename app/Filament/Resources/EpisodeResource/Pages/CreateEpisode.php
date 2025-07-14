<?php

namespace App\Filament\Resources\EpisodeResource\Pages;

use App\Filament\Resources\EpisodeResource;
use Filament\Resources\Pages\CreateRecord;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CreateEpisode extends CreateRecord
{
    protected static string $resource = EpisodeResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Episode berhasil dibuat!';
    }

    // Method yang benar untuk handle file upload
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Handle video file upload
        if (isset($data['video_path']) && $data['video_path'] instanceof TemporaryUploadedFile) {
            $data['video_path'] = $data['video_path']->store('videos', 'public');
        }

        return $data;
    }

    // Optional: Custom redirect after create
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}