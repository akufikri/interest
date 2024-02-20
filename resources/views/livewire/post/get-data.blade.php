<div class="flex justify-center">
    <div class="max-w-7xl w-full">
        <div class="p-5 sm:p-8">
            <div class="columns-2 gap-5 sm:columns-2 sm:gap-8 md:columns-3 lg:columns-4 [&>img:not(:first-child)]:mt-8">
                @forelse ($data as $item)
                    <a href="/postingan/detail/{{ $item->id }}" class="relative group">
                        <img class="rounded-3xl mb-5" src="{{ Storage::url($item->media) }}" />
                        <div
                            class="absolute inset-0 hover:bg-black/50 opacity-0 hover:opacity-100 text-white text-2xl font-bold flex items-end justify-center p-5">
                            <div class="grid">
                                <h1 class="uppercase">{{ Str::limit($item->title, 10, '.....') }}</h1>
                                <p class="font-normal text-sm text-center">{{ Str::limit($item->desc, 30, '....') }}</p>
                            </div>
                        </div>

                    </a>
                @empty
                    <div class="absolute right-96 me-20 mt-24">
                        <h1 class="text-white text-6xl font-light">Tidak ada postingan</h1>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
