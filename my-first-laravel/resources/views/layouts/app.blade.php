<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Laravel App' }}</title>
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Itim&family=Lobster&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
        </style>
    @endif
</head>
<body class="bg-slate-100 text-slate-900 dark:bg-slate-800 dark:text-slate-200">
    <header class="w-full">
        <nav class="flex justify-center items-center gap-3 p-5 space-x-4 bg-slate-700">
            <a href="#home" class="hover:underline">Logo</a>
            <div class="flex gap-3">
                <a href="/home" class="hover:underline">Home</a>
                <a href="/posts" class="hover:underline">Blog</a>
                <a href="/contact" class="hover:underline">Contact</a>
                <a href="/create-post" class="hover:underline">Add New Post</a>
                @if (Auth::check())
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline">Logout</button>
                </form>
                @else
                    <a href="/login" class="hover:underline">Sign In</a>
                @endif
            </div>
        </nav>
    </header>
    @yield('content')

    <footer class="absolute bottom-0 left-0 p-5 w-full text-center">
        <p class="">©️ my laravel app 2024</p>
    </footer>
</body>
</html>
