<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Anime extends Model
{
    protected $fillable = [
        'title',
        'producer',
        'duration',
        'release_date',
        'studio',
        'status',
        'slug',
        'synopsis',
        'thumbnail'
    ];

    protected static function booted()
    {
        static::creating(function ($anime) {
            if (empty($anime->slug)) {
                $anime->slug = Str::slug($anime->title);
            }
        });
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class)->orderBy('episode_number');
    }

    public function getLatestStatusAttribute(): ?string
    {
        return $this->episodes()->latest()->value('status');
    }

    public function getThumbnailUrlAttribute(): string
    {
        return $this->thumbnail
            ? asset('storage/' . $this->thumbnail)
            : 'https://via.placeholder.com/150';
    }

    public function getEpisodesCountAttribute(): int
    {
        return $this->episodes()->count();
    }
}
