@extends('layout.layout')

@section('title')
Comments
@endsection

@section('content')
<h1 class="text-3xl font-bold text-center text-indigo-600">
        This is Comments page
    </h1>

            @foreach ($comments as $comment)
                <h2>The author is  {{$comment->author}}  </h2>
                <h2>The body is {{$comment->content}}  </h2>
                <a href="{{route('posts.show',$comment->post->id)}}"> {{$comment->post->title}}</a>
                <br>
                <br>
            @endforeach

            {{$comments->links()}}
@endsection
