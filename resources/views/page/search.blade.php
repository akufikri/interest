@extends('layouts.app')
@section('content')
    <section>
        <div class="flex justify-center items-center">
            <div class="max-w-6xl w-full">
                <div>
                    <span class="text-white ">Results ({{ count($result) }})</span>
                </div>
                <div class="columns-1 gap-5 sm:columns-2 sm:gap-8 md:columns-3 lg:columns-4 [&>img:not(:first-child)]:mt-8">
                    @if (count($result) > 0)
                        @foreach ($result as $item)
                            <a href="/postingan/detail/{{ $item->id }}" class="relative group">
                                <img class="rounded-3xl mb-5" src="{{ Storage::url($item->media) }}" />
                                <div
                                    class="absolute inset-0 hover:bg-black/50 opacity-0 hover:opacity-100 text-white text-2xl font-bold flex items-end justify-center p-5">
                                    <div class="grid">
                                        <h1 class="uppercase">{{ Str::limit($item->title, 10, '.....') }}</h1>
                                        <p class="font-normal text-sm text-center">{{ Str::limit($item->desc, 30, '....') }}
                                        </p>
                                    </div>
                                </div>

                            </a>
                        @endforeach
                    @else
                        <div class="absolute right-96 me-40 mt-24">
                            <h1 class="text-white text-6xl font-light">No results found.</h1>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
