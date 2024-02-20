<div>
    <div>
        <div class="container mx-auto py-8">
            <div class="max-w-7xl mx-auto">
                <div class="bg-gray-900 rounded-2xl p-6 mb-6 flex justify-between">
                    <h1 class="text-white text-2xl font-bold">My Album</h1>
                    <button data-modal-target="modal-album" data-modal-toggle="modal-album"
                        class="bg-gray-800 text-white hover:-rotate-2 border border-gray-600  px-5 py-2 rounded-2xl hover:bg-gray-700 transition">Buat
                        Album</button>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    @forelse ($data as $album)
                        <div class="h-56 bg-gray-800 rounded-2xl">
                            @forelse ($album->posts->take(1) as $post)
                                <a href="/album/detail/{{ $album->id }}"
                                    class="flex flex-col items-center p-4 overflow-hidden bg-white rounded-3xl shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <img class="object-cover hover:scale-105 transition w-full rounded-2xl shadow-md md:h-64 md:w-48 shadow-slate-900  h-64"
                                        src="{{ Storage::url($post->media) }}" alt="">
                                    <div class="flex flex-col justify-between p-4 leading-normal">
                                        <h5
                                            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $album->title }}</h5>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            {{ Str::limit($album->desc, 100, '....') }}
                                        </p>
                                    </div>
                                </a>

                            @empty
                                <div class="col-span-2 flex items-center justify-center text-white">
                                    <h1 class="mt-20 text-2xl">Tidak ada postingan</h1>
                                </div>
                            @endforelse
                        </div>
                    @empty
                        <div class="col-span-3 text-white text-center">
                            Tidak ada album
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>


    <x-model id="modal-album" size='max-w-xl' title="Buat Album Mu..">
        @slot('content')
            <form wire:submit.prevent='submit'>
                <div class="mb-3">
                    <input class="w-full rounded-2xl focus:ring-gray-700 focus:border-gray-700 bg-gray-900 text-white"
                        type="text" name="title" id="title" placeholder="Title" wire:model='title'>
                </div>
                <div class="mb-3">
                    <textarea class="w-full resize-none rounded-2xl focus:ring-gray-700 focus:border-gray-700 bg-gray-900 text-white"
                        name="" id="" cols="30" rows="3" placeholder="Deksripsi(Opsional)" wire:model='desc'></textarea>
                </div>
            @endslot
            @slot('footer')
                <div class="py-4 px-7">
                    <button data-modal-hide="modal-album" type="submit"
                        class="bg-gray-900 hover:bg-gray-700 transition shadow-sm text-white px-7 py-3 rounded-2xl">Buat
                        Album</button>
                </div>
            </form>
        @endslot
    </x-model>
</div>
