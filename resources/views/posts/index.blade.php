@extends('layout.layout')

@section('title')
    Post
@endsection

@section('content')
    @if (session('success'))
        <div class="bg-green-50 px-3 py-2">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-3xl font-bold text-center text-indigo-600">
        This is Blog page
    </h1>
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="{{ route('posts.create') }}"
            class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-indigo-500 hover:shadow-md focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Create
        </a>
    </div>

    @foreach ($posts as $post)
        <div
            class="flex justify-between items-center border border-gray-200 rounded-lg px-4 py-4 my-3 bg-white shadow-sm hover:shadow-md transition">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-1">
                    <a href="{{ route('posts.show', $post->id) }}" class="hover:underline">
                        {{ $post->title }}
                    </a>
                </h2>
                <p class="text-sm text-gray-500">
                    By {{ $post->author }}
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700 font-medium">
                    Edit
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure? This cannot be reversed.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
@endsection
