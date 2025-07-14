@extends('layouts.app')

@section('title', 'Home')

@section('navbar')
    @include('components.navbar', ['animes' => $animes])
@endsection

@section('hero')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.hero-carousel', ['animes' => $animes])
@endsection

@section('trending')
    @include('frontend.animes.trending', ['trendingAnimes' => $trendingAnimes])
@endsection


@section('content')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <h1 class="section-title text-white mb-4">Anime Populer Musim Ini...</h1>

    <div class="row row-cols-2 row-cols-md-4 g-4">
        @foreach($trendingAnimes as $anime)
            <div class="col">
                <a href="{{ route('anime.show', $anime->slug) }}" class="text-decoration-none">
                    <div
                        class="card card-anime h-100 position-relative 
                                                {{ strtolower($anime->status) === 'tamat' ? 'bg-dark text-white' : 'bg-secondary text-white' }}">

                        <img src="{{ asset('storage/' . $anime->thumbnail) }}" class="card-img-top" alt="{{ $anime->title }}">

                        {{-- Status Badge --}}
                        <span class="badge 
                                                    {{ strtolower($anime->status) === 'tamat' ? 'bg-danger' : 'bg-warning text-dark' }}
                                                    position-absolute top-0 start-0 m-2 status-badge">
                            {{ $anime->status }}
                        </span>

                        <div class="card-body">
                            <h5 class="card-title">{{ $anime->title }}</h5>
                            <p class="card-text small">
                                {{ $anime->episodes_count }} Episode<br>
                                @foreach($anime->genres as $g)
                                    <span class="badge bg-primary">{{ $g->name }}</span>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    {{-- Tombol lihat semuanya --}}
    <div class="d-flex justify-content-center mt-5 mb-5">
        <a href="{{ route('anime.index') }}" class="custom-modern-button">
            ➤ Lihat Semuanya
        </a>
    </div>
@endsection