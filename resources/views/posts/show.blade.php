@extends('layout.layout')

@section('title')
Post_{{$post->title}}
@endsection

@section('content')
<h1 class="text-3xl font-bold text-center text-indigo-600">
        This is Show page
    </h1>

                <h2 class="text-2xl" >The title is  {{$post->title}}  </h2>
                <h2>The author is  {{$post->author}}  </h2>
                <h2>The body is {{$post->body}}  </h2>
                <ul>
                    @foreach($post->comments as $comment)
                        <li> Content: {{$comment->content}} , Author: {{$comment->author}}</li>
                    @endforeach
                </ul>

@endsection
