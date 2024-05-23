@extends('base')

@section('title', 'Accueil du Blog')

@section('content')
<h1>Mon Blog</h1>

@foreach ($posts as $post)
<article>
    <h2>{{ $post->name }}</h2>
    @if ($post->category)
        <span>Catégorie : {{ $post->category->name }}</span>
    @endif

    @if (!$post->tags->isEmpty())
        @foreach ($post->tags as $tag)
            <span>{{ $tag->name }}</span>
        @endforeach
    @endif
    <p>
        {{ $post->content }}
    </p>
    <p>
        <a href="{{ route('blog.show', ['post' => $post->slug]) }}" class="btn btn-primary">
            Lire la suite
        </a>
    </p>
    <p>
        <a href="{{ route('blog.edit', ['post' => $post->slug]) }}" class="btn btn-secondary">
            Editer l'article
        </a>
    </p>
</article>
@endforeach

<div class="pagination">
    {{ $posts->links() }}
</div>
@endsection
