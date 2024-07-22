@extends('layouts/main')

@section('container')
<div class="">
    <h1 class="text-3xl font-bold">My Posts</h1>
    

<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 my-4">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3">Title</th>
            <th scope="col" class="px-6 py-3">Category</th>
            <th scope="col" class="px-6 py-3">Excerpt</th>
            <th scope="col" class="px-6 py-3">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr class="bg-white border-b">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $post->title }}</th>
            <td class="px-6 py-4">{{ $post->category->name }}</td>
            <td class="px-6 py-4">{{ $post->excerpt }}</td>
            <td class="px-6 py-4 flex space-x-2">
                <a href="posts/{{ $post->slug }}" class="text-blue-500 hover:text-blue-700">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="posts/{{ $post->slug }}/edit" class="text-green-500 hover:text-green-700">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="posts/{{ $post->slug }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>

    <button type="submit" class="flex justify-center rounded-md bg-gray-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-800">Create New Post</button>
</div>

@endsection
