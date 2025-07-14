@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Anime Terbaru</h1>
        <div class="row">
            @foreach($animes as $anime)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('storage/' . $anime->thumbnail) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $anime->title }}</h5>
                            <p class="card-text">{{ $anime->genres->pluck('name')->join(', ') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection