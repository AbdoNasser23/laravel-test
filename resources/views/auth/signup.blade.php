@extends('layout.layout-auth')

@section('title')
    Sign Up
@endsection

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <a href="{{route('index')}}">

                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"
                class="mx-auto h-10 w-auto" />
            </a>
                <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-900">
                Create your account
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="{{ route('auth.signup') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-900">
                        Full Name
                    </label>
                    <div class="mt-2">
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                            class=" block w-full rounded-lg bg-white px-3 py-2 text-sm text-gray-900 border border-gray-300 shadow-sm placeholder:text-gray-400 transition duration-200 ease-in-out hover:border-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:shadow-md outline-none @error('name') border-red-500 ring-1 ring-red-300 @enderror" />
                    </div>

                    @error('name')
                        <div class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-900">
                            Email address
                        </label>
                        <div class="mt-2">
                            <input id="email" type="email" name="email" autocomplete="email"
                                value="{{ old('email') }}"
                                class=" block w-full rounded-lg bg-white px-3 py-2 text-sm text-gray-900
                                border border-gray-300 shadow-sm placeholder:text-gray-400 transition duration-200
                                ease-in-out hover:border-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200
                                focus:shadow-md outline-none @error('email') border-red-500 ring-1 ring-red-300 @enderror " />
                        </div>
                    </div>

                    @error('email')
                        <div class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-900">
                            Password
                        </label>
                        <div class="mt-2">
                            <input id="password" type="password" name="password" autocomplete="current-password"
                                class=" block
                                w-full rounded-lg bg-white px-3 py-2 text-sm text-gray-900 border border-gray-300 shadow-sm
                                placeholder:text-gray-400 transition duration-200 ease-in-out hover:border-gray-400
                                focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:shadow-md outline-none
                                @error('password') border-red-500 ring-1 ring-red-300 @enderror" />
                        </div>
                    </div>

                    @error('password')
                        <div class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-900">
                            Confirm Password
                        </label>
                        <div class="mt-2">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                autocomplete="current-password"
                                class=" block w-full rounded-lg bg-white px-3 py-2 text-sm
                                text-gray-900 border border-gray-300 shadow-sm placeholder:text-gray-400 transition
                                duration-200 ease-in-out hover:border-gray-400 focus:border-indigo-500 focus:ring-2
                                focus:ring-indigo-200 focus:shadow-md outline-none
                                @error('password_confirmation') border-red-500 ring-1 ring-red-300 @enderror" />
                        </div>
                    </div>

                    <!-- Button -->
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-lg bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm transition duration-200 mt-6 hover:bg-indigo-500 hover:shadow-md focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Sign Up
                        </button>
                    </div>

            </form>
        </div>
    </div>
@endsection
