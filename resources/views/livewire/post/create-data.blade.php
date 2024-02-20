<form wire:submit='submit()'>
    <div class="flex justify-center">
        <div class="max-w-4xl w-full">
            <div class="flex w-full gap-4">
                <div class="w-full">
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full @if ($media) h-auto @else h-64 @endif border-2 border-gray-300 border-dashed rounded-2xl cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center ">
                                @if ($media)
                                    <img class="rounded-2xl" src="{{ $media->temporaryUrl() }}" alt="">
                                @else
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                @endif
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" wire:model='media' />

                        </label>
                    </div>
                    @error('media')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full">
                    <div class="mb-3">
                        <input wire:model='title' type="text" id="first_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-2xl focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                            placeholder="Title" autocomplete="off">
                        @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <textarea wire:model='desc' id="message" rows="9"
                            class="block p-2.5 w-full text-sm resize-none text-gray-900 bg-gray-50 rounded-2xl border border-gray-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500"
                            placeholder="Descriptions...."></textarea>
                        @error('desc')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex gap-3">
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 px-7 py-2 rounded-full">Submit</button>
                        <button type="button" onclick="location.href='/'"
                            class="text-white bg-gray-800 hover:bg-gray-600 px-7 py-2 rounded-full">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
