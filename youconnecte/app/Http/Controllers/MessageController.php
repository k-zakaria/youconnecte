<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {

        $messages = Message::with('user')->latest()->paginate(10);

        return view('posts.index', compact('messages'));
    }
 
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'content' => 'required|string|max:255', 
            'media' => 'image|mimes:jpeg,png,jpg,gif|max:2000000',
        ]);

        $message = new Message();
        $message->user_id = auth()->user()->id;
        $message->content = $validatedData['content'];


        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('media');
            $message->media = $mediaPath;
        }

        $message->save();

        return redirect()->back()->with('success', 'poste publié binaja7');
    }

  
}

