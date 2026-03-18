@extends('layout.layout')

@section('title')
Post
@endsection

@section('content')

@if(session('success'))
    <div class="bg-green-50 px-3 py-2">
        {{session('success')}}
    </div>
@endif
<h1 class="text-3xl font-bold text-center text-indigo-600">
        This is Blog page
    </h1>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{route('posts.create')}}"
                    class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-indigo-500 hover:shadow-md focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Create
                </a>
            </div>
            @foreach ($posts as $post)
                <h2 class="text-2xl" > {{$post->title}}  </h2>
                <h2>The author is  {{$post->author}}  </h2>
                <h2>The body is {{$post->body}}  </h2>
                <br>
                <br>
            @endforeach

            {{ $posts->links() }}
@endsection
