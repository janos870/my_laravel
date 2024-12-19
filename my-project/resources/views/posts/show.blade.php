@extends('layouts.app')

@section('content')
<div class="blog-cover-image w-full h-[30rem] flex items-center justify-center text-center relative">
    @if ($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="absolute inset-0 w-full h-full object-cover rounded-lg opacity-50">
    @endif
    <h2 class="relative z-10 text-xl font-semibold text-slate-900 dark:text-slate-100">{{ $post->title }}</h2>
</div>
<div class="my-20 flex justify-center">
    <div class="text-slate-900 dark:text-slate-100 rounded-md p-2 m-2 w-full max-w-xl">
        <p class="text-left">{{ $post->content }}</p>
        <div class="mt-4">
            <p class="text-xs text-gray-500">{{ $post->author }}</p>
            <p class="text-xs text-gray-500">{{ $post->created_at->format('Y-m-d') }}</p>
        </div>
    </div>
</div>
@endsection

