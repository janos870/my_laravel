@extends('layouts.app')

@section('content')
<div class="container mx-auto my-40 p-8 flex-grow">
    <form action="/posts" method="POST" enctype="multipart/form-data"
        class="bg-slate-800 p-6 rounded-lg shadow-lg w-1/3 mx-auto">
        <h1 class="text-3xl font-bold mb-6">Új poszt létrehozása</h1>
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-lg font-medium mb-2">Poszt címe</label>
            <input type="text" id="title" name="title"
                class="w-full p-3 bg-slate-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500"
                placeholder="Írd be a poszt címét" required>
        </div>

        <!-- Tartalom mező -->
        <div class="mb-4">
            <label for="content" class="block text-lg font-medium mb-2">Poszt tartalma</label>
            <textarea id="content" name="content" rows="5"
                class="w-full p-3 bg-slate-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500"
                placeholder="Írd be a poszt tartalmát" required></textarea>
        </div>

        <!-- Szerző mező -->
        <div class="mb-6">
            <label for="author" class="block text-lg font-medium mb-2">Szerző</label>
            <input type="text" id="author" name="author"
                class="w-full p-3 bg-slate-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-slate-500"
                placeholder="Írd be a szerző nevét" required>
        </div>

        <div class="mb-6">
            <label for="image" class="block text-white text-sm font-bold mb-2">Image</label>
            <input type="file" name="image" id="image" class="w-full p-3 rounded border text-white">
        </div>

        <!-- Küldés gomb -->
        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg">
            Poszt létrehozása
        </button>
    </form>
</div>

@endsection

