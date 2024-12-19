@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 my-20">
    <form action="{{ url('/login') }}" method="POST" class="bg-slate-700 shadow-md rounded-lg p-6 max-w-sm mx-auto">
        @csrf
        <h2 class="text-xl font-bold mb-6 text-white text-center">Login</h2>
        
        <div class="mb-4">
            <label for="email" class="block text-slate-300 mb-2">Email:</label>
            <input type="email" name="email" id="email" class="border border-slate-500 rounded-md w-full p-2 focus:outline-none focus:ring focus:ring-slate-300 text-white bg-slate-600" required>
        </div>
        
        <div class="mb-4">
            <label for="password" class="block text-slate-300 mb-2">Jelszó:</label>
            <input type="password" name="password" id="password" class="border border-slate-500 rounded-md w-full p-2 focus:outline-none focus:ring focus:ring-slate-300 text-white bg-slate-600" required>
        </div>
        
        <button type="submit" class="bg-slate-600 text-white rounded-md w-full py-2 hover:bg-slate-500 transition duration-200">Bejelentkezés</button>

        <p class="my-2">Ha nem vagy még regisztrálva kattincs a Sign Up linkre: <a href="/register" class="text-blue-500">Sign Up</a></p>

        @if ($errors->any())
        <div class="mt-4 text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </form>
</div>
@endsection






