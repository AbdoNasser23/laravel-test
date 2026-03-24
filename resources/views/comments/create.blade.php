@extends('layout.layout')

@section('title')
Comments
@endsection

@section('content')
<h1 class="text-3xl font-bold text-center text-indigo-600">
        This is Create page
    </h1>
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
        <input type="hidden" name="posts_id" value="{{$postId}}" >
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <h2 class="text-base/7 font-semibold text-gray-900">Write your comment</h2>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-3">
                        <label for="author" class="block text-sm/6 font-medium text-gray-900">Author</label>
                        <div class="mt-2">
                            <input id="author" type="text" name="author" value="{{old('author')}}"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border shadow-sm sm:text-sm
                                {{ $errors->has('author') ? 'border-red-500 ring-1 ring-red-300' : 'border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200' }}" />
                        </div>
                        @error('author')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="content" class="block text-sm/6 font-medium text-gray-900">Content</label>

                        <div class="mt-2">
                            <textarea id="content" name="content" rows="3"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border shadow-sm transition duration-200 ease-in-out outline-none sm:text-sm {{
                                $errors->has('content') ? 'border-red-500 ring-1 ring-red-300' : 'border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200' }}"
                                >{{ old('content') }}</textarea>
                        <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the comment.</p>
                        @error('content')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                    </div>

                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('posts.show',$postId) }}" class="text-sm/6 font-semibold text-gray-900">
                    Cancel
                </a>

                <button type="submit"
                    class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-indigo-500 hover:shadow-md focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Save
                </button>
            </div>
        </div>
    </form>
@endsection
