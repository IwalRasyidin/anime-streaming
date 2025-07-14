<x-filament::widget>
    <x-filament::card>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold">Episode Terbaru</h2>
            <a href="{{ route('filament.admin.resources.episodes.index') }}"
                class="text-sm text-primary-600 hover:underline">
                Lihat semua
            </a>
        </div>

        <div class="space-y-4">
            @foreach ($episodes as $episode)
                <div class="flex items-center gap-4 bg-white p-3 rounded-xl shadow-sm border hover:shadow-md transition">
                    {{-- Thumbnail Anime --}}
                    <img src="{{ asset('storage/' . $episode->anime->thumbnail) }}" alt="{{ $episode->anime->title }}"
                        class="w-16 h-24 object-cover rounded-md border" />

                    {{-- Episode Info --}}
                    <div>
                        <div class="font-semibold text-base">{{ $episode->title }}</div>
                        <div class="text-sm text-gray-600">
                            Anime: <span class="font-medium">{{ $episode->anime->title }}</span>
                        </div>
                        <div class="text-xs text-gray-500 mt-1">
                            Diunggah: {{ $episode->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-filament::card>
</x-filament::widget>