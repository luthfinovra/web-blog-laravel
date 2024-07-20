@extends('layouts/main')

@section('container')    
<h1 class="text-3xl font-bold">Post Categories</h1>

<ul class="py-4">
@foreach ($categories as $category)
    <a href="/categories/{{ $category->slug }}">
        <div class="badge">{{ $category->name }}</div>
    </a>
@endforeach
</ul>
<a href="/posts" class="">Back to Posts</a>
@endsection
