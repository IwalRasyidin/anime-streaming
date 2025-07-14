<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'episode_number',
        'anime_id',
        'status',
        'video_path',
    ];

    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
}
