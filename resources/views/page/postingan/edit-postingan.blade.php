@extends('layouts.app')
@section('content')
    <section>
        @livewire('post.edit-post', ['id' => $data->id]);
    </section>
@endsection
