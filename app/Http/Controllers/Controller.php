<?php

namespace App\Http\Controllers;
use App\Models\Anime;


abstract class Controller
{
    public function index()
    {
        $animes = Anime::with('genres')->withCount('episodes')->latest()->paginate(8);
        return view('frontend.home', compact('animes'));
    }

}
