<?php

// App\Http\Controllers\EpisodeController.php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function show($id)
    {
        $episode = Episode::with('anime.genres', 'anime.episodes')->findOrFail($id);
        $anime = $episode->anime;

        // Previous Episode
        $previousEpisode = $anime->episodes()
            ->where('episode_number', '<', $episode->episode_number)
            ->orderByDesc('episode_number')
            ->first();

        // Next Episode
        $nextEpisode = $anime->episodes()
            ->where('episode_number', '>', $episode->episode_number)
            ->orderBy('episode_number')
            ->first();

        return view('episodes.show', compact('episode', 'anime', 'previousEpisode', 'nextEpisode'));

    }

}
