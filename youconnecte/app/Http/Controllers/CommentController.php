<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $messageId)
    {
        $request->validate([
            'commentaire' => 'required|string|max:255',
        ]);
        $message = Message::findOrFail($messageId);
        $comment = $message->comments()->create([
            'user_id' => auth()->user()->id,
            'content' => $request->input('commentaire'),
        ]);

        return redirect()->back()->with('success', 'comment added');
    }

}
