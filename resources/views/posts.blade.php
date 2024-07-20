@extends('layouts/main')

@section('container')    

@if ($posts->count())
<div class="max-w-sm rounded overflow-hidden shadow-lg">
    <img class="w-full" src="https://source.unsplash.com/1920x1080/?{{ $posts[0]->category->name }}" alt="Sunset in the mountains">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{ $posts[0]->title }}</div>
<div>

    <a href="/users/{{ $posts[0]->user->username }}" class="href-secondary">{{ $posts[0]->user->name }} - </a>
    <a href="/categories/{{ $posts[0]->category->slug }}" class="inline-block"><div class="badge">{{ $posts[0]->category->name }}</div></a>
    <small class="italic">({{ $posts[0]->created_at->diffForHumans() }})</small>
</div>
    <p class="text-gray-700 text-base mt-2">
        {{ $posts[0]->excerpt }}
      </p>
      <div>
  
          <a href="/posts/{{ $posts[0]->slug }}" class="inline-block mt-2">Read More</a>
      </div>
    </div>
  </div>
@else
<h1 class="text-3xl font-bold">Blog Page</h1>
@endif

<h1 class="text-3xl font-bold">Blog Page</h1>
<a href="/categories"><h2 class="mt-4">Filter by Categories</h2></a>


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
    
@endsection
