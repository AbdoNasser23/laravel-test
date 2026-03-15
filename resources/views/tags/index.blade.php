@extends('layout.layout')

@section('title')
Tags
@endsection

@section('content')
<h1 class="text-3xl font-bold text-center text-indigo-600">
        This is Tags page
    </h1>

            @foreach ($tags as $tag)
                <h2 class="text-2xl" > {{$tag->title}}  </h2>
                <br>
            @endforeach
@endsection
