<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;

class AnimeController extends Controller
{
    public function index()
    {
        $trendingAnimes = Anime::with('genres')->inRandomOrder()->limit(12)->get();
        $animes = Anime::with('genres')->latest()->paginate(12); // pastikan ini tidak null

        return view('frontend.home', compact('trendingAnimes', 'animes'));
    }

    public function list(Request $request)
    {
        $query = Anime::with('genres')->withCount('episodes');

        if ($request->has('search') && $request->search !== null) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $animes = $query->latest()->paginate(12);

        return view('frontend.animes.anime-list', compact('animes'));
    }



    public function show($slug)
    {
        $anime = Anime::with(['genres', 'episodes'])->where('slug', $slug)->firstOrFail();
        return view('frontend.animes.show', compact('anime'));
    }
    public function ongoing()
    {
        $animes = Anime::with('genres')
            ->where('status', 'ongoing')
            ->latest()
            ->paginate(12);

        return view('frontend.animes.ongoing', compact('animes'));
    }


}
