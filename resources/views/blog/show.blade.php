@extends('base')

@section('title', $post->name)

@section('content')
    <article>
        <h1>{{ $post->name }}</h1>
        <p>
            {!! $post->content !!}
        </p>
    </article>
@endsection
