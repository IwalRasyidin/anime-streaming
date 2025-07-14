<?php

namespace App\Http\Controllers;

use App\Models\Anime;

class HomeController extends Controller
{
    public function index()
    {
        $animes = Anime::withCount('episodes')->with('genres')->latest()->paginate(12);

        $trending = Anime::withCount('episodes')
            ->with('genres')
            ->inRandomOrder()
            ->take(7)
            ->get();

        return view('frontend.home', compact('animes', 'trending'));
    }

    public function animes()
    {
        $animes = Anime::with('genres')->latest()->get();
        return view('frontend.animes.index', compact('animes'));
    }
}
