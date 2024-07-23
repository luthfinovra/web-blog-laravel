@extends('layouts/main')

@section('container')
    <div class="py-4 space-y-4">
        <div class="action">
            <button type="submit" class="bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none"> <a href="/dashboard/posts" class="text-white hover:text-white">Back to Dashboard</a></button>
            <button type="submit" class="focus:outline-none  bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2"><a href="/dashboard/posts/{{$post->slug}}/edit" class="text-white hover:text-white">Edit Posts</a></button>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="focus:outline-none  bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 me-2 mb-2"><a href="/dashboard/posts"class="text-white hover:text-white">Delete Posts</a></button>
            </form>
        </div>
        <h3 class="text-3xl font-bold">{{ $post->title }}</h3>
        <a href="/users/{{ $post->user->username }}" class="href-secondary">{{ $post->user->name }} - </a>
        <a href="/categories/{{ $post->category->slug }}" class="inline-block"><div class="badge">{{ $post->category->name }}</div></a>
        <div class="inline-block">
            {!! $post->body !!}
        </div>
    </div>
@endsection