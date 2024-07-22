@extends('layouts/main')

@section('container')    
<h1 class="text-3xl font-bold">{{ $name }} Posts</h1>

@foreach ($posts as $post)
<article class="py-4">
    <a href="/posts/{{ $post->slug }}">
        <h2 class="font-bold">{{ $post->title }}</h2>
    </a>
    <a href="/users/{{ $post->user->username }}" class="href-secondary">{{ $post->user->name }} - </a>
    <a href="/categories/{{ $post->category->slug }}" class="inline-block"><div class="badge">{{ $post->category->name }}</div></a>
<p>{{ $post->excerpt }}</p>
</article>
@endforeach
<a href="/" class="">Back to Posts</a>
@endsection
