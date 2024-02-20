<div>
    <div class="flex justify-center">
        <div class="max-w-4xl w-full">
            <div class="bg-gray-800 h-36 justify-between rounded-2xl p-5 flex">
                <div class="ms-14"></div>
                <div class="text-center">
                    <h1 class="text-white text-2xl font-medium">{{ $data->title }}</h1>
                    <span class="text-white">{{ $data->desc }}</span>
                </div>
                <div>
                    <button data-dropdown-toggle="albumDropdown" data-dropdown-placement="bottom-start" id="buttonAlbum"
                        class="bg-gray-900 h-8 w-8 rounded-full border border-gray-600">
                        <i class="fa-solid fa-ellipsis text-white"></i>
                    </button>

                    <div id="albumDropdown"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">

                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                            <li>
                                <button data-modal-toggle="modal-hapus-album" data-modal-target="modal-hapus-album"
                                    class="block w-full text-start  px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hapus
                                    Album</button>
                            </li>
                            <li>
                                <button data-modal-target="modal-edit" data-modal-toggle="modal-edit"
                                    class="block w-full text-start  px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit
                                    Album</button>
                            </li>


                        </ul>

                    </div>
                </div>
            </div>
            <div class="p-5 sm:p-8">
                <div
                    class="columns-1 gap-5 sm:columns-2 sm:gap-8 md:columns-3 lg:columns-4 [&>img:not(:first-child)]:mt-8">
                    @forelse ($albumDetail as $item)
                        <div class="relative group">
                            @if ($item->media == null)
                                <img class="rounded-2xl mb-5" src="{{ Storage::url($item->post->media) }}"
                                    alt="">
                            @else
                                tidak tersedia
                            @endif
                            <div class="absolute inset-0 hover:bg-black/50 p-4 opacity-0 hover:opacity-100">
                                <button data-modal-target="modal-hapus" data-modal-toggle="modal-hapus"
                                    class="text-gray-100 w-6 h-6 bg-gray-900 rounded-full">
                                    <i class="fa fa-trash text-sm"></i>
                                </button>
                            </div>
                        </div>

                        <x-model id="modal-hapus" size="max-w-lg" title="">
                            @slot('content')
                                <section class="my-5">
                                    <h1 class="text-2xl text-white text-center font-bold">Yakin anda ingin menghapus ?
                                        {{ $item->post->title }}</h1>
                                </section>
                            @endslot
                            @slot('footer')
                                <div class="grid py-5 p-4">
                                    <button data-modal-hide="modal-hapus" wire:click='delete({{ $item->id }})'
                                        class="bg-gray-900 rounded-xl py-4 text-md hover:bg-gray-950 border border-gray-500 text-white">Hapus</button>
                                </div>
                            @endslot
                        </x-model>


                    @empty
                        <span class="textw-white">Postingan tidak tersedia</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <x-model id="modal-edit" title="Edit Album" size="max-w-3xl">
        @slot('content')
            <form wire:submit='update_album'>
                <div class="mb-3">
                    <input class="w-full rounded-2xl focus:ring-gray-700 focus:border-gray-700 bg-gray-900 text-white"
                        type="text" name="title" id="title" placeholder="Title" wire:model='title'
                        value="{{ $data->title }}">
                </div>
                <div class="mb-3">
                    <textarea class="w-full resize-none rounded-2xl focus:ring-gray-700 focus:border-gray-700 bg-gray-900 text-white"
                        name="" id="" cols="30" rows="3" placeholder="Deksripsi(Opsional)" wire:model='desc'>{{ $data->desc }}</textarea>
                </div>
            @endslot
            @slot('footer')
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" data-modal-hide="modal-edit" type="button"
                        class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Update</button>
                    <button data-modal-hide="modal-edit" type="button"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                </div>
            </form>
        @endslot
    </x-model>

    <x-model id="modal-hapus-album" size="max-w-lg" title="">
        @slot('content')
            <section class="my-5">
                <h1 class="text-2xl text-white text-center font-bold">Yakin anda ingin menghapus ?
                    {{ $data->title }}</h1>
            </section>
        @endslot
        @slot('footer')
            <div class="grid py-5 p-4">
                <button data-modal-hide="modal-hapus" wire:click='delete_album({{ $data->id }})'
                    class="bg-gray-900 rounded-xl py-4 text-md hover:bg-gray-950 border border-gray-500 text-white">Hapus</button>
            </div>
        @endslot
    </x-model>
</div>
