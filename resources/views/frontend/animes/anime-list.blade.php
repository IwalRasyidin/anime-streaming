@extends('layouts.app')

@section('content')
    <div class="container my-5">
    

        <h2 class="text-white mb-4">Daftar Anime</h2>

        <div class="row row-cols-2 row-cols-md-4 g-4">
            @foreach($animes as $anime)
                <div class="col">
                    <a href="{{ route('anime.show', $anime->slug) }}" class="text-decoration-none">
                        <div class="card card-anime h-100 position-relative overflow-hidden 
                                    {{ $anime->status === 'tamat' ? 'bg-dark border-danger' : 'bg-secondary' }} text-white">

                            {{-- Badge Status --}}
                            <span class="badge position-absolute top-0 start-0 m-2 shadow-sm 
                                        {{ $anime->status === 'tamat' ? 'bg-danger' : 'bg-warning text-dark' }}">
                                {{ ucfirst($anime->status) }}
                            </span>

                            <img src="{{ asset('storage/' . $anime->thumbnail) }}" class="card-img-top"
                                alt="{{ $anime->title }}">

                            <div class="card-body">
                                <h5 class="card-title text-white">{{ $anime->title }}</h5>
                                <p class="card-text small text-white">
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

        <div class="mt-4 d-flex justify-content-center">
            {{ $animes->links() }}
        </div>
    </div>
@endsection