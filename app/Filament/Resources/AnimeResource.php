<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnimeResource\Pages;
use App\Models\Anime;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Support\Str;

class AnimeResource extends Resource
{
    protected static ?string $model = Anime::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),

                TextInput::make('producer')->nullable(),
                TextInput::make('duration')->required(),

                DatePicker::make('release_date')
                    ->required()
                    ->label('Release Date'),

                TextInput::make('studio')->nullable(),

                Select::make('status')
                    ->required()
                    ->options([
                        'ongoing' => 'Ongoing',
                        'tamat' => 'Tamat',
                    ])
                    ->label('Status'),

                TextInput::make('slug')->disabled(),

                Textarea::make('synopsis')->required(),

                FileUpload::make('thumbnail')
                    ->image()
                    ->directory('thumbnails')
                    ->disk('public')
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('500')
                    ->imageResizeTargetHeight('700')
                    ->required(fn(string $context) => $context === 'create')
                    ->nullable(),


                Select::make('genres')
                    ->relationship('genres', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->label('Genres'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->width(80)
                    ->height(80)
                    ->url(fn($record) => asset($record->thumbnail)),

                TextColumn::make('title')->sortable()->searchable(),

                TextColumn::make('latest_status')
                    ->label('Status')
                    ->getStateUsing(fn($record) => $record->latest_status)
                    ->badge()
                    ->color(fn($state) => match ($state) {
                        'ongoing' => 'info',
                        'completed' => 'success',
                        'upcoming' => 'warning',
                        default => 'gray',
                    }),

                TagsColumn::make('genres.name')->label('Genres'),
                TextColumn::make('studio')->label('Studio')->searchable()->sortable(),
                TextColumn::make('episodes_count')->label('Total Episode')->counts('episodes')->sortable(),
                TextColumn::make('release_date')->date(),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnimes::route('/'),
            'create' => Pages\CreateAnime::route('/create'),
            'edit' => Pages\EditAnime::route('/{record}/edit'),
        ];
    }
}
