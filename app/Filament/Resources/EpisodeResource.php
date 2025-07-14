<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EpisodeResource\Pages;
use App\Models\Episode;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class EpisodeResource extends Resource
{
    protected static ?string $model = Episode::class;
    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
    protected static ?string $navigationGroup = 'Content';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),

                Forms\Components\TextInput::make('episode_number')
                    ->label('Episode Number')
                    ->default(
                        fn(callable $get) =>
                        Episode::where('anime_id', $get('anime_id'))->count() + 1
                    ),
                Forms\Components\Select::make('anime_id')
                    ->label('Anime')
                    ->relationship('anime', 'title')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'ongoing' => 'Ongoing',
                        'tamat' => 'Tamat',
                    ])
                    ->required(),

                Forms\Components\FileUpload::make('video_path')
                    ->label('Video File')
                    ->disk('public')
                    ->directory('videos')
                    ->preserveFilenames()
                    ->acceptedFileTypes(['video/mp4', 'video/mkv', 'video/avi'])
                    ->maxSize(2048000) // 2GB
                    ->uploadingMessage('Uploading video... This may take a while.')
                    ->loadingIndicatorPosition('center')
                    ->panelAspectRatio('16:9')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadProgressIndicatorPosition('center')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('episode_number')
                    ->label('Episode')
                    ->sortable(),

                Tables\Columns\TextColumn::make('anime.title')
                    ->label('Anime')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEpisodes::route('/'),
            'create' => Pages\CreateEpisode::route('/create'),
            'edit' => Pages\EditEpisode::route('/{record}/edit'),
        ];
    }
}
