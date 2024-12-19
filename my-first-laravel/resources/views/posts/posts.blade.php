@extends('layouts.app')

@section('content')
    
<div class="container m-5">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
        @foreach($posts as $post)
            <div class="bg-slate-300 text-slate-900 dark:bg-slate-700 dark:text-slate-100 rounded-md p-3">
                <img src="{{ asset($post->image) }}" alt="image" class="w-full h-52">

                <div>
                    <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    <p class="text-xs text-gray-500">{{ $post->created_at->format('Y-m-d') }}</p>
                </div>
                <!-- Update Button -->
                <a href="{{ url('/posts/' . $post->id . '/edit') }}" 
                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
                    Update
                </a>
            </div>
        @endforeach
    </div>
</div>




    {{-- <div>
        <button id="btn" class="bg-teal-700 p-3 text-teal-50 rounded-sm mx-5 my-3">Show text</button>
        <p id="text" class="mx-5 my-3" style="display: none">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, minus?</p>
    </div> --}}
@endsection