@extends('layout.layout')

@section('title')
    Post_{{ $post->title }}
@endsection

@section('content')
    @if (session('success'))
        <div class="bg-green-50 px-3 py-2">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-3xl font-bold text-center text-indigo-600">
        This is Show page
    </h1>
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-sm p-6 my-6 border border-gray-200">

        <div class="flex justify-between items-start">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    {{ $post->title }}
                </h2>

                <p class="text-sm text-gray-500 mb-3">
                    By {{ $post->author }}
                </p>

                <p class="text-gray-700 leading-relaxed">
                    {{ $post->body }}
                </p>
            </div>

            <div>
                <a href="{{ route('comments.create', ['postId' => $post->id]) }}"
                    class="ml-4 rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 hover:shadow-md transition">
                    Add Comment
                </a>
            </div>
        </div>

    </div>

    @if ($post->comments->isNotEmpty())
        <div class="max-w-2xl mx-auto bg-white border border-gray-200 rounded-xl p-4 shadow-sm">

            <ul class="space-y-3">
                @foreach ($post->comments as $comment)
                    <li class="border border-gray-100 rounded-lg p-3 bg-gray-50 hover:bg-gray-100 transition">
                        <p class="text-gray-800">
                            {{ $comment->content }}
                        </p>
                        <span class="text-sm text-gray-500">
                            — {{ $comment->author }}
                        </span>
                    </li>
                @endforeach
            </ul>

        </div>
    @endif
@endsection
