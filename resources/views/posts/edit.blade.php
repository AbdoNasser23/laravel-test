@extends('layout.layout')

@section('title')
    Post - Edit
@endsection

@section('content')
    <h1 class="text-3xl font-bold text-center text-indigo-600">
        This is Edit page
    </h1>

    <form method="POST" action="{{ route('posts.update',$post->id) }}">
        @csrf
        @method('PATCH')

        <input type="hidden" name="id" value="{{$post->id}}"/>
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <h2 class="text-base/7 font-semibold text-gray-900">Edit post : {{ $post->title }}</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Use this form to update post.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="col-span-full">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input name="title" id="title" value="{{old('title',$post->title) }}" type="text"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border shadow-sm sm:text-sm
                                {{ $errors->has('title') ? 'border-red-500 ring-1 ring-red-300' : 'border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200' }}">
                        </div>
                        @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="col-span-full">
                        <label for="body" class="block text-sm/6 font-medium text-gray-900">Content</label>

                        <div class="mt-2">
                            <textarea id="body" name="body" rows="3"
                                class="block w-full rounded-md bg-white px-3 py-2 text-base text-gray-900 border shadow-sm transition duration-200 ease-in-out outline-none sm:text-sm {{ $errors->has('body') ? 'border-red-500 ring-1 ring-red-300' : 'border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200' }}">{{ old('body', $post->body) }}</textarea>
                            <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the post.</p>
                            @error('body')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <div class="flex items-start gap-3 mt-4">

                                <label class="relative flex items-center cursor-pointer">

                                    <input id="published" type="checkbox" value="1" {{( old('published') || (!old() && $post->published) )? 'checked' : ''}} name="published" class="peer hidden">

                                    <div
                                        class="w-5 h-5 flex items-center justify-center rounded-md border border-gray-300 shadow-sm transition duration-200 peer-checked:bg-indigo-600 peer-checked:border-indigo-600">

                                        <svg class="w-3.5 h-3.5 text-white opacity-0 transition duration-200 peer-checked:opacity-100"
                                            fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>

                                    </div>

                                </label>

                                <div class="text-sm">
                                    <label for="published" class="font-medium text-gray-900">
                                        Is Published
                                    </label>
                                    <p id="published" class="text-gray-500">
                                        Do you want it published or save as draft.
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="{{ route('posts.index') }}" class="text-sm/6 font-semibold text-gray-900">
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
