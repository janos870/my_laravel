<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    // Listázza az összes posztot
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    // Megjelenít egy új poszt létrehozásához szükséges űrlapot
    public function create()
    {
        return view('posts.create');
    }

    // Új poszt létrehozása
    public function store(Request $request)
    {
        Log::info('A store metódus elindult');
        Log::info('Kérések adatai:', $request->all());

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // dd('Validáció sikeres');

        // Kép mentése, ha van feltöltve
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Új poszt létrehozása
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => $request->input('author'),
            'image' => $imagePath,
        ]);

        return redirect('/posts')->with('success', 'Post created successfully!');
    }


    // Megjelenít egy adott posztot
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]); // Itt a posts/show.blade.php nézetet kell használnod
    }

    // Megjelenít egy poszt szerkesztéséhez szükséges űrlapot
    public function edit($id)
    {
        // Itt add meg a logikát a poszt lekérdezésére az adatbázisból
        return view('posts.edit'); // Itt a posts/edit.blade.php nézetet kell használnod
    }

    // Frissít egy meglévő posztot
    public function update(Request $request, $id)
    {
        // Itt add meg a logikát a poszt frissítésére az adatbázisban
    }

    // Töröl egy meglévő posztot
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
        } else {
            return redirect()->route('posts.index')->with('error', 'Post not found.');
        }
    }
}
