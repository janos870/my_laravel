<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        // Ellenőrizzük, hogy be van-e jelentkezve a felhasználó
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view messages.');
        }

        $userId = Auth::id();
        $users = User::where('id', '!=', $userId)->get();
        $messages = Message::where('receiver_id', $userId)
            ->orWhere('sender_id', $userId)
            ->get();

        return view('messages.index', compact('users', 'messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $senderId = Auth::id();

        Message::create([
            'sender_id' => $senderId,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->route('messages.index')->with('success', 'Message sent!');
    }
}
