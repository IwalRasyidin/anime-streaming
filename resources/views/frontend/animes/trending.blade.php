<div class="container my-5">
    <h2 class="mb-4 text-white">Trending Anime 🔥</h2>

    <div class="position-relative">
        <!-- Navigasi Panah -->
        <button id="prevBtn" class="slider-nav start" aria-label="Scroll Left">‹</button>

        <div id="trendingSlider" class="d-flex overflow-hidden gap-3 px-4" style="scroll-behavior: smooth;">
            @foreach ($trendingAnimes as $anime)
                <a href="{{ route('anime.show', $anime->slug) }}" class="text-decoration-none text-light"
                    style="flex: 0 0 auto; width: 220px;">
                    <div id="iwal" class="card bg-dark text-white shadow-sm h-100 anime-cardd">
                        <div class="position-relative">
                            <!-- Status Badge -->
                            @if($anime->status)
                                <span class="position-absolute top-0 start-0 m-1 px-2 py-1 badge rounded"
                                    style="background-color: {{ $anime->status === 'Tamat' ? '#dc3545' : '#198754' }};">
                                    {{ $anime->status }}
                                </span>
                            @endif

                            <!-- Thumbnail -->
                            <img src="{{ asset('storage/' . $anime->thumbnail) }}" class="card-img-top"
                                alt="{{ $anime->title }}" style="height: 240px; object-fit: cover;">
                        </div>

                        <!-- Konten -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $anime->title }}</h5>
                            <p class="card-text text-muted">{{ $anime->genres->pluck('name')->implode(', ') }}</p>
                        </div>
                    </div>
                </a>

            @endforeach
        </div>

        <!-- Navigasi Panah -->
        <button id="nextBtn" class="slider-nav end" aria-label="Scroll Right">›</button>
    </div>
</div>