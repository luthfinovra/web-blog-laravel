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

    <button type="submit" class="bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none"> <a href="/" class="text-white hover:text-white">Back to All Post</a></button>
@endsection