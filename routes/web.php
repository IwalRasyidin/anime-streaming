<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\EpisodeController;
use Livewire\Volt\Volt;

Route::get('/anime/ongoing', [AnimeController::class, 'ongoing'])->name('anime.ongoing');


// Home
Route::get('/', [AnimeController::class, 'index'])->name('home');

// ✅ Daftar anime (pastikan ini yang dipakai)
Route::get('/anime', [AnimeController::class, 'list'])->name('anime.index');

// Detail anime
Route::get('/anime/{slug}', [AnimeController::class, 'show'])->name('anime.show');

// Halaman episode
Route::get('/episode/{episode}', [EpisodeController::class, 'show'])->name('episodes.show');

// Authentication
Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
