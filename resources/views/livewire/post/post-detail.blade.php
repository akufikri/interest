<div>
    <div class="flex justify-center gap-4">
        <div class="w-full max-w-sm h-auto">
            <img class="rounded-2xl" src="{{ Storage::url($data->media) }}" alt="">
        </div>
        <div class="w-full max-w-sm">
            <div class="bg-gray-900  w-full max-w-sm rounded-2xl p-5">
                <div class="flex gap-4 justify-between px-2">
                    <div class="flex gap-3">
                        <img class="inline-block mt-1 h-9 w-9 rounded-full ring-2 ring-white"
                            src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="">
                        <div class="grid">
                            <h1 class="text-md font-medium text-red-300">{{ $data->user->name }}</h1>
                            <span class="text-xs text-red-300">{{ $data->user->email }}</span>
                        </div>
                    </div>
                    <div>
                        <button class="bg-gray-800 w-9 h-9 rounded-full" id="postButton" type="button"
                            data-dropdown-toggle="postDropdown" data-dropdown-placement="bottom-start"><i
                                class="fa-solid fa-ellipsis text-white"></i></button>
                        <div id="postDropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">

                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                                @if ($data->user->id == Auth::user()->id)
                                    <li>
                                        <button
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full"
                                            onclick="location.href='/postingan/edit/{{ $data->id }}'"><i
                                                class="fa-light fa-pen-to-square text-white "></i> <span>Edit
                                                suntingan</span></button>
                                    </li>
                                    <li>
                                        <button data-modal-target="modal-hapus" data-modal-toggle="modal-hapus"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full"><i
                                                class="fa-light fa-trash text-white "></i>
                                            <span>Hapus
                                                suntingan</span></button>
                                    </li>
                                @else
                                @endif
                                <li>
                                    <button
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white w-full"
                                        data-modal-target="modal-album" data-modal-toggle="modal-album"><i
                                            class="fa-regular fa-bookmark text-white"></i>
                                        <span>Simpan</span></button>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!---content----->
                <div class="mt-3 ">
                    <h3 class="my-4 text-gray-500">Komentar {{ $coment->count() }}</h3>
                    <div class="overflow-y-auto h-64 ps-4">
                        @foreach ($coment as $item)
                            <div class="flex gap-3 mb-4 justify-between">
                                <div class="flex gap-4">
                                    <img class="inline-block mt-1 h-5 w-5 rounded-full ring-2 ring-white"
                                        src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                    <div class="grid">
                                        <span
                                            class="text-red-100 text-sm font-medium">{{ $item->user->username }}</span>
                                        <span class="text-sm text-red-200 font-light">{{ $item->content }}</span>
                                    </div>
                                </div>
                                @if ($item->user->id == Auth::user()->id)
                                    <button wire:click='delete_coment({{ $item->id }})'
                                        class="text-gray-300 w-7 h-7 bg-gray-800 rounded-full">
                                        <i class="fa fa-trash text-sm"></i>
                                    </button>
                                @else
                                @endif
                            </div>
                        @endforeach
                    </div>

                </div>
                <!---content----->
                <div class="pt-5">
                    <div class="flex gap-2">
                        <button type="button" wire:click='likes'>
                            @if ($liked)
                                <i class="fa-regular fa-circle-heart text-white text-2xl"></i>
                            @else
                                <i class="fa-light fa-circle-heart text-white text-2xl"></i>
                            @endif
                        </button>
                        <span class="text-white">
                            @if ($data->likes == null)
                                0
                            @else
                                {{ $data->likes->count() }}
                            @endif Suka
                        </span>
                    </div>
                    <form wire:submit.prevent='submit_comment'>
                        <div class="mt-2 flex gap-4">
                            <input type="text" name="content" id="content" wire:model='content'
                                class="bg-gray-900 text-white w-full rounded-full focus:ring-gray-500 focus:border-gray-500">
                            <button type="submit"><i
                                    class="fa-light fa-paper-plane text-white w-9 h-9 bg-gray-800 pt-2.5 rounded-full"></i></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <x-model id="modal-album" size="max-w-4xl" title="Simpan ke album anda">
        @slot('content')
            <section>
                <div class="grid grid-cols-3 gap-4">
                    @forelse ($album as $item)
                        <button data-modal-hide="modal-album" wire:click='save_to_album({{ $item->id }})'
                            class="h-24 bg-gray-900 rounded-lg hover:scale-105 transition">
                            <h1 class="text-white">{{ $item->title }}</h1>
                            <span class="text-white">{{ $item->desc }}</span>
                        </button>
                    @empty
                        <span class="text-white">tidak ada album</span>
                    @endforelse
                </div>
            </section>
        @endslot
        @slot('footer')
        @endslot
    </x-model>

    <x-model id="modal-hapus" size="max-w-xl" title="">
        @slot('content')
            <section class="my-5">
                <h1 class="text-2xl text-white text-center font-bold">Yakin anda ingin menghapus ? {{ $data->title }}</h1>
            </section>
        @endslot
        @slot('footer')
            <div class="grid py-5 p-4">
                <button wire:click='delete_post({{ $data->id }})'
                    class="bg-gray-900 rounded-xl py-4 text-2xl text-white">Hapus</button>
            </div>
        @endslot
    </x-model>
</div>
