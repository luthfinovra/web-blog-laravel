@extends('layouts/main')

@section('container')

<h1 class="text-3xl font-bold">Latest Posts</h1>

<form class="max-w-lg mt-4" action="/">
    <div class="flex">
        <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only">Your Email</label>
        <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100" type="button">
            {{ request('category') ? $categories->firstWhere('slug', request('category'))->name : 'All categories' }}
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                <li>
                    <button type="button" class="category-button inline-flex w-full px-4 py-2 hover:bg-gray-100" data-category="">All categories</button>
                </li>
                @foreach ($categories as $category)
                <li>
                    <button type="button" class="category-button inline-flex w-full px-4 py-2 hover:bg-gray-100" data-category="{{ $category->slug }}">{{ $category->name }}</button>
                </li>
                @endforeach
            </ul>
        </div>
        <input type="hidden" name="category" id="category-input" value="{{ request('category') }}">
        <div class="relative w-full">
            <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search" name="search" value="{{ request('search') }}"/>
            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </div>
</form>

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

{{ $posts->onEachSide(5)->links() }}

<script>
    document.getElementById('dropdown-button').addEventListener('click', function () {
        document.getElementById('dropdown').classList.toggle('hidden');
    });

    document.querySelectorAll('.category-button').forEach(button => {
        button.addEventListener('click', () => {
            document.getElementById('category-input').value = button.getAttribute('data-category');
            document.getElementById('dropdown-button').innerText = button.innerText;
            document.getElementById('dropdown').classList.add('hidden');
        });
    });

    document.addEventListener('click', function(event) {
        const isClickInsideDropdown = document.getElementById('dropdown').contains(event.target);
        const isClickInsideButton = document.getElementById('dropdown-button').contains(event.target);

        if (!isClickInsideDropdown && !isClickInsideButton) {
            document.getElementById('dropdown').classList.add('hidden');
        }
    });
</script>

@endsection
