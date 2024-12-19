@extends('layouts.app')

@section('content')
<div class="max-w-lg my-20 mx-auto bg-slate-700 p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold mb-6">
        {{ isset($post) ? 'Bejegyzés Szerkesztése' : 'Új Bejegyzés Létrehozása' }}
    </h1>

    <form action="{{ isset($post) ? url('/posts/' . $post->id) : url('/create') }}" 
          method="POST" enctype="multipart/form-data" class="">
        @csrf <!-- Laravel CSRF token -->
        @if (isset($post))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Cím:</label>
            <input type="text" id="title" name="title" 
                   value="{{ old('title', $post->title ?? '') }}" required 
                   class="border border-slate-500 rounded-md w-full p-2 focus:outline-none focus:ring focus:ring-slate-300 text-white bg-slate-600" 
                   placeholder="Bejegyzés címe">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Tartalom:</label>
            <textarea id="content" name="content" rows="5" required 
                      class="border border-slate-500 rounded-md w-full p-2 focus:outline-none focus:ring focus:ring-slate-300 text-white bg-slate-600" 
                      placeholder="Írd ide a tartalmat">{{ old('content', $post->content ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Kép feltöltése:</label>
            <input type="file" id="image" name="image" accept="image/*" 
                   class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-slate-100">
            @if(isset($post) && $post->image)
                <p class="text-sm text-gray-300 mt-2">Jelenlegi kép: {{ $post->image }}</p>
            @endif
        </div>

        <button type="submit" 
                class="w-full bg-blue-500 text-white font-bold py-2 rounded hover:bg-blue-600">
            {{ isset($post) ? 'Bejegyzés Frissítése' : 'Bejegyzés Létrehozása' }}
        </button>
    </form>
</div>
@endsection
