<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title')</title>
</head>

<body class="h-full text-gray-900">
    <div class="min-h-full">
        <!-- NAVBAR -->
        <nav class="bg-gray-800 shadow-md">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">

                    <!-- LEFT -->
                    <div class="flex items-center">
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                            class="size-8" />

                        @php
                            $active = 'bg-gray-900 text-white';
                            $inactive = 'text-gray-300 hover:bg-gray-700 hover:text-white';
                        @endphp

                        <div class="hidden md:flex ml-10 space-x-4">
                            <a href="{{ route('index') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('index') ? $active : $inactive }}">
                                Dashboard
                            </a>

                            <a href="{{ route('about') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('about') ? $active : $inactive }}">
                                About
                            </a>

                            <a href="{{ route('contact') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('contact') ? $active : $inactive }}">
                                Contact
                            </a>

                            <a href="{{ route('posts.index') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium {{ request()->routeIs('posts.*') ? $active : $inactive }}">
                                Posts
                            </a>
                        </div>
                    </div>

                    <!-- RIGHT (AUTH) -->
                    <div class="hidden md:flex items-center space-x-3">

                        @auth
                        <span class="text-sm font-medium text-gray-800 bg-gray-100 px-3 py-1 rounded-md">{{Auth::user()->name}}</span>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button class="ml-2 text-red-500 hover:text-red-700 text-sm">Logout</button>
                        </form>
                        @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-300 hover:text-white transition">
                            Login
                        </a>

                        <a href="{{ route('signup') }}"
                            class="px-4 py-2 rounded-md bg-indigo-600 text-sm font-semibold text-white hover:bg-indigo-500 transition shadow">
                            Sign Up
                        </a>
                        @endauth
                    </div>

                    <!-- MOBILE BUTTON -->
                    <div class="md:hidden">
                        <button id="menuBtn"
                            class="p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white">
                            ☰
                        </button>
                    </div>

                </div>
            </div>

            <!-- MOBILE MENU -->
            <div id="mobileMenu" class="hidden md:hidden px-4 pb-4 space-y-2">

                <a href="{{ route('index') }}" class="block px-3 py-2 rounded-md bg-gray-900">Dashboard</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md hover:bg-gray-700">About</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md hover:bg-gray-700">Contact</a>
                <a href="{{ route('posts.index') }}" class="block px-3 py-2 rounded-md hover:bg-gray-700">Posts</a>

                <hr class="border-gray-700">

                <a href="{{ route('login') }}"
                    class="block px-3 py-2 rounded-md hover:bg-gray-700">Login</a>

                <a href="{{ route('signup') }}"
                    class="block px-3 py-2 rounded-md bg-indigo-600 text-center">Sign Up</a>
            </div>
        </nav>

        <!-- CONTENT -->
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- JS -->
    <script>
        const btn = document.getElementById('menuBtn');
        const menu = document.getElementById('mobileMenu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

</body>

</html>
