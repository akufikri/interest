@extends('layouts.app')
@section('content')
    <section>
        @livewire('album.detail-album', ['id' => $data->id])
    </section>
@endsection
