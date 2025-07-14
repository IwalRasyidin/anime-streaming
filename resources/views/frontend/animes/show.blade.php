@extends('layouts.app')

@section('title', $anime->title)

@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="container py-5">
        <div class="row align-items-start">
            <!-- Gambar Thumbnail -->
            <div class="col-lg-4 col-md-5 mb-4 text-center">
                <img src="{{ $anime->thumbnail_url }}" class="img-fluid rounded shadow-sm" alt="{{ $anime->title }}">
            </div>

            <!-- Info Anime -->
            <div class="col-lg-8 col-md-7">
                <h1 class="mb-3 fw-bold">{{ $anime->title }}</h1>

                <p class="mb-2">
                    <strong>Genre:</strong>
                    @foreach($anime->genres as $genre)
                        <span class="badge bg-primary me-1">{{ $genre->name }}</span>
                    @endforeach
                </p>

                <p><strong>Durasi:</strong> {{ $anime->duration ?? 'N/A' }}</p>
                <p><strong>Studio:</strong> {{ $anime->studio ?? 'N/A' }}</p>
                <p><strong>Produser:</strong> {{ $anime->producer ?? 'N/A' }}</p>
                <p><strong>Tanggal Rilis:</strong> {{ $anime->release_date ?? 'N/A' }}</p>

                <p class="mt-3 text-light-emphasis" style="text-align: justify;">
                    {{ $anime->synopsis }}
                </p>

                <p class="mt-4 mb-2">
                    <strong>Jumlah Episode:</strong> {{ $anime->episodes_count ?? $anime->episodes->count() }}
                </p>

                <!-- Episode List -->
                <div class="row">
                    @forelse($anime->episodes as $episode)
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                            <a href="{{ route('episodes.show', $episode->id) }}" class="btn btn-outline-primary w-100">
                                Episode {{ $episode->episode_number ?? '-' }}
                            </a>
                        </div>
                    @empty
                        <p class="text-muted">Belum ada episode tersedia.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection