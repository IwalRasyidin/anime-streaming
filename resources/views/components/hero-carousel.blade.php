<div class="hero-carousel-container">
    <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner h-100">
            @foreach ($animes as $index => $anime)
                <div class="carousel-item h-100 {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $anime->thumbnail) }}" class="d-block w-100 h-100"
                        alt="{{ $anime->title }}">

                    <div class="carousel-caption text-start {{ $anime->status === 'Tamat' ? 'caption-tamat' : '' }}">
                        <h2>{{ $anime->title }}</h2>

                        <div class="mb-2">
                            @foreach($anime->genres as $genre)
                                <span class="badge bg-primary">{{ $genre->name }}</span>
                            @endforeach
                        </div>

                        {{-- STATUS berada di bawah genre --}}
                        <div class="mb-3">
                            <span class="badge {{ $anime->status === 'Tamat' ? 'bg-danger' : 'bg-success' }}">
                                {{ $anime->status }}
                            </span>
                        </div>

                        <p>{{ \Illuminate\Support\Str::limit($anime->synopsis, 180) }}</p>
                        <a href="{{ route('anime.show', $anime->slug) }}" class="btn btn-warning">Tonton Sekarang</a>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>