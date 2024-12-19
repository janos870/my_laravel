@extends('layouts.app')

@section('content')

{{-- <style>
    main.home {
        background-image: url('./images/home001.png');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style> --}}

<main class="home flex justify-center items-center min-h-screen">
    <h1 class="text-4xl text-white bg-slate-700 p-4 rounded-md shadow-md tracking-widest">{{ $title }}</h1>
</main>
@endsection