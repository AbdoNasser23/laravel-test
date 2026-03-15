@extends('layout.layout')

@section('title')
Post
@endsection

@section('content')
<h1 class="text-3xl font-bold text-center text-indigo-600">
        This is Blog page
    </h1>

            @foreach ($posts as $post)
                <h2 class="text-2xl" > {{$post->title}}  </h2>
                <h2>The author is  {{$post->author}}  </h2>
                <h2>The body is {{$post->body}}  </h2>
                <br>
                <br>
            @endforeach

            {{ $posts->links() }}
@endsection
