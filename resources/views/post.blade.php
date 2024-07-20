@extends('layouts/main')

@section('container')
    <div class="py-4 space-y-4">
        <h3 class="text-3xl font-bold">{{ $post->title }}</h3>
        <a href="/users/{{ $post->user->username }}" class="href-secondary">{{ $post->user->name }} - </a>
        <a href="/categories/{{ $post->category->slug }}" class="inline-block"><div class="badge">{{ $post->category->name }}</div></a>
        <div class="inline-block">
            {!! $post->body !!}
        </div>
    </div>

    <a href="/posts" class="">Back to Posts</a>
@endsection