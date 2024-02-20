@extends('layouts.app')
@section('content')
    <section>
        @livewire('post.post-detail', ['id' => $data->id]);
    </section>
@endsection
