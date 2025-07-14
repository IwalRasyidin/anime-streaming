@extends('layouts.app')

@section('title', 'Anime Ongoing')

@section('content')
    <div class="container my-5">
        <h2 class="text-white mb-4">Anime Ongoing</h2>

        <div class="row row-cols-2 row-cols-md-4 g-4">
            @forelse($animes as $anime)
                <div class="col">
                    <a href="{{ route('anime.show', $anime->slug) }}" class="text-decoration-none">
                        <div class="card card-anime bg-secondary text-white h-100 shadow-sm">
                            <img src="{{ asset('storage/' . $anime->thumbnail) }}" class="card-img-top"
                                alt="{{ $anime->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $anime->title }}</h5>

                                <!-- STATUS BADGE -->
                                <span class="badge 
                {{ $anime->status == 'ongoing' ? 'bg-success' : ($anime->status == 'completed' ? 'bg-danger' : 'bg-secondary') }} 
                mb-2">
                                    {{ ucfirst($anime->status) }}
                                </span>

                                <p class="card-text small mb-0">
                                    {{ $anime->episodes_count }} Episode<br>
                                    @foreach($anime->genres as $g)
                                        <span class="badge bg-primary">{{ $g->name }}</span>
                                    @endforeach
                                </p>
                            </div>

                        </div>
                    </a>
                </div>
            @empty
                <p class="text-white">Tidak ada anime yang sedang ongoing saat ini.</p>
            @endforelse
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $animes->links() }}
        </div>
    </div>
@endsection