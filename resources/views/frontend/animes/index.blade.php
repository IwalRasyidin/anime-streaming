@extends('layouts.app')

@section('content')
    <h1 class="mb-4 fw-bold">Daftar Anime Terbaru</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($animes as $anime)
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <img src="{{ asset('storage/' . $anime->thumbnail) }}" class="card-img-top" alt="{{ $anime->title }}"
                        style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $anime->title }}</h5>
                        <p class="card-text">
                            <strong>Studio:</strong> {{ $anime->studio ?? '-' }}<br>
                            <strong>Genre:</strong>
                            @foreach ($anime->genres as $genre)
                                <span class="badge bg-primary">{{ $genre->name }}</span>
                            @endforeach
                        </p>
                    </div>
                    <div class="card-footer bg-white">
                        <small class="text-muted">Dirilis:
                            {{ \Carbon\Carbon::parse($anime->release_date)->format('M Y') }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection