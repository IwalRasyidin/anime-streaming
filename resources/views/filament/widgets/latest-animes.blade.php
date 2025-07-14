<x-filament::widget>
    <x-filament::card>
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-800">Anime Terbaru</h2>
            <a href="{{ route('filament.admin.resources.animes.index') }}"
                class="text-sm font-medium text-primary-600 hover:underline">
                Lihat semua
            </a>
        </div>

        <div class="space-y-4">
            @foreach ($animes as $anime)
                <div class="flex items-center gap-4 bg-white p-3 rounded-xl shadow-sm border hover:shadow-md transition">
                    <img src="{{ asset('storage/' . $anime->thumbnail) }}" alt="{{ $anime->title }}"
                        class="w-16 h-24 object-cover rounded-lg border" />
                    <div class="flex flex-col justify-between gap-1">
                        <div class="font-semibold text-base text-gray-900">{{ $anime->title }}</div>
                        <div class="flex flex-wrap gap-1">
                            @foreach ($anime->genres as $genre)
                                <span class="bg-primary-100 text-primary-700 text-xs font-medium px-2 py-0.5 rounded-full">
                                    {{ $genre->name }}
                                </span>
                            @endforeach
                        </div>
                        <div class="text-xs text-gray-500 mt-1">
                            {{ $anime->episodes_count }} Episode
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-filament::card>
</x-filament::widget>
