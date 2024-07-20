@extends('layouts/main')

@section('container')    
<h1 class="text-3xl font-bold">{{ $name }} Posts</h1>

@if ($posts->count())
<div class="max-w-sm rounded overflow-hidden shadow-lg">
    <img class="w-full" src="/img/card-top.jpg" alt="Sunset in the mountains">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
      <p class="text-gray-700 text-base">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
      </p>
    </div>
    <div class="px-6 pt-4 pb-2">
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
      <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
    </div>
  </div>
@else
<h1 class="text-3xl font-bold">Blog Page</h1>
@endif

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
<a href="/posts" class="">Back to Posts</a>
@endsection
