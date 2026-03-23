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
        <div class="flex justify-between item-center border border-gray-200 px-4 py-6 my-2">
            <div>
                <h2 class="text-2xl"> {{ $post->title }} </h2>
                <h2> {{ $post->author }} </h2>
            </div>
            <div>
                <a class="text-blue-500 hover:text-gray-500" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                <form action="{{route('posts.destroy',$post->id)}}" method="POST" onsubmit="return confirm('Are you sure,This cannot be reversed?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-gray-500">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
    {{ $posts->links() }}
@endsection
