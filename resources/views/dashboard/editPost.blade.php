@extends('layouts/main')

@section('container')
<div class="max-w-3xl">
    <a href="/dashboard/posts" class="text-white hover:text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-bold rounded-lg text-sm px-4 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none">Back to Dashboard</a>
    <h1 class="text-3xl font-bold mt-2 py-2">Edit Post</h1>
    <div class="mt-4">
        <form class="space-y-6" action="/dashboard/posts/{{ $post->slug }}" method="POST">
            @method("PUT")
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Post Title</label>
                <div class="mt-2">
                    <input id="title" name="title" type="text" autocomplete="title" required value="{{  old('title', $post->title) }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-800 sm:text-sm sm:leading-6">
                </div>
                @error('title')
                <div class="text-sm">
                    <span href="#" class="font-semibold text-red-500">{{ $message }}</span>
                </div>
                @enderror
            </div>
            
            <div>
                <div class="flex items-center justify-between">
                    <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
                </div>
                <div class="mt-2">
                    <input id="slug" name="slug" type="text" autocomplete="current-slug" value="{{  old('slug', $post->slug) }}" required  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-800 sm:text-sm sm:leading-6">
                </div>
                @error('slug')
                <div class="text-sm">
                    <span href="#" class="font-semibold text-red-500">{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div>
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach ($categories as $category)
                        @if(old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-sm">
                    <span href="#" class="font-semibold text-red-500">{{ $message }}</span>
                </div>
                @enderror
            </div>       
            <div>
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900">Body</label>
                @error('body')
                <div class="text-sm mb-2">
                    <span href="#" class="font-semibold text-red-500">{{ $message }}</span>
                </div>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old("body", $post->body) }}" required>
                <trix-editor input="body"></trix-editor>
            </div>         
            <button type="submit" class="flex justify-center rounded-md bg-gray-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-800">Save Post</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + encodeURIComponent(title.value))
                .then(response => response.json())
                .then(data => slug.value = data.slug)
                .catch(error => console.error('Error:', error));
        });
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>
@endsection