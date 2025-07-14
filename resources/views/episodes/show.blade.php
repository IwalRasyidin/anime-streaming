@extends('layouts.app')

@section('title', $episode->title)

@section('content')
    <style>
        /* === Tombol Navigasi Episode === */
        .btn-outline-light {
            border-color: #ffffff55;
            color: #ffffffcc;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            background-color: #ffffff15;
            color: #ffffff;
            transform: translateY(-2px);
        }

        /* === Tombol Daftar Semua Episode === */
        .btn-sm {
            transition: all 0.25s ease-in-out;
            border-radius: 8px;
            font-weight: 500;
            padding: 6px 12px;
        }

        .btn-sm:hover {
            transform: scale(1.05);
            opacity: 0.95;
        }

        .btn-outline-light {
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            background-color: transparent;
        }

        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* === Video Player === */
        video {
            border-radius: 10px;
            outline: none;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.6);
        }

        /* === Info Box === */
        .bg-dark {
            background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
        }

        /* === Daftar Episode Card === */
        .card.bg-secondary {
            background-color: #2e2e2e !important;
            border-radius: 10px;
        }

        .card-header {
            background-color: #1a1a1a;
            color: #fff;
            font-size: 1.1rem;
        }

        .card-body a {
            min-width: 100px;
            text-align: center;
        }

        /* === Responsive Utility (opsional) === */
        @media (max-width: 768px) {
            .btn-sm {
                font-size: 0.8rem;
                padding: 4px 8px;
            }

            .card-body {
                justify-content: center;
            }

            h2 {
                font-size: 1.4rem;
            }
        }
    </style>
    <div class="container py-5">

        <!-- Navigasi Episode -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            @if ($previousEpisode)
                <a href="{{ route('episodes.show', $previousEpisode->id) }}" class="btn btn-outline-light shadow-sm">
                    ← Episode {{ $previousEpisode->episode_number }}
                </a>
            @else
                <span></span>
            @endif

            @if ($nextEpisode)
                <a href="{{ route('episodes.show', $nextEpisode->id) }}" class="btn btn-outline-light shadow-sm">
                    Episode {{ $nextEpisode->episode_number }} →
                </a>
            @endif
        </div>

        <!-- Video Player -->
        <div class="ratio ratio-16x9 mb-4 shadow-lg rounded overflow-hidden border border-secondary">
            <video controls class="w-100 rounded">
                <source src="{{ asset('storage/' . $episode->video_path) }}" type="video/mp4">
                Browser Anda tidak mendukung video.
            </video>
        </div>

        <!-- Informasi Episode -->
        <div class="bg-dark text-white rounded p-4 mb-5 shadow-sm">
            <h2 class="fw-bold">{{ $episode->title }}</h2>
            <p class="mb-1"><strong>Anime:</strong> <a href="{{ route('anime.show', $anime->slug) }}"
                    class="text-decoration-none text-info">{{ $anime->title }}</a></p>
            <p><strong>Episode:</strong> {{ $episode->episode_number }}</p>
        </div>

        <!-- Daftar Episode -->
        <div class="card bg-secondary text-white shadow-sm border-0">
            <div class="card-header fw-semibold bg-dark border-bottom border-light">
                Daftar Semua Episode
            </div>
            <div class="card-body d-flex flex-wrap gap-2">
                @foreach($episode->anime->episodes->sortBy('episode_number') as $ep)
                    <a href="{{ route('episodes.show', $ep->id) }}"
                        class="btn btn-sm {{ $ep->id === $episode->id ? 'btn-primary' : 'btn-outline-light' }}">
                        Episode {{ $ep->episode_number }}
                    </a>
                @endforeach
            </div>
        </div>

    </div>
@endsection