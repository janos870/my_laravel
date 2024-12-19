<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'My Laravel App' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css  ">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Itim&family=Lobster&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');
    </style>
    @endif
</head>

<body class="body-light dark:body-dark min-h-screen overflow-auto flex flex-col">
    <header class="app-header header-light dark:header-dark">
        <nav class="flex justify-center gap-5 items-center p-5">
            <a href="#home" class="hover:underline font-bold">MyBlog</a>
            <div class="hidden md:flex gap-3">
                <a href="/home" class="hover:underline font-bold">Home</a>
                <a href="/posts" class="hover:underline font-bold">Blog</a>
                <a href="/contact" class="hover:underline font-bold">Contact</a>
                <a href="/posts/create" class="hover:underline font-bold">Add New Post</a>
                @if (Auth::check())
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline font-bold">Logout</button>
                </form>
                @else
                <a href="/login" class="hover:underline font-bold">Sign In</a>
                @endif
            </div>
            <div id="menuToggle" class="md:hidden absolute right-5 cursor-pointer">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>

        {{-- Mobile Navbar  --}}
        <nav id="mobileMenu" class="md:hidden flex flex-col items-center gap-3 p-5">
            <a href="/home" class="hover:underline font-bold">Home</a>
            <a href="/posts" class="hover:underline font-bold">Blog</a>
            <a href="/contact" class="hover:underline font-bold">Contact</a>
            <a href="/posts/create" class="hover:underline font-bold">Add New Post</a>
            @if (Auth::check())
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="hover:underline font-bold">Logout</button>
            </form>
            @else
            <a href="/login" class="hover:underline font-bold">Sign In</a>
            @endif
        </nav>
    </header>


    @yield('content')


    <footer class="footer-light dark:footer-dark p-5 flex justify-center items-center">
        <p class="">©️ my laravel app 2024</p>
    </footer>
</body>

</html>