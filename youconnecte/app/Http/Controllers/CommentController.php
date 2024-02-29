<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $messageId)
    {
        $request->validate([
            'commentaire' => 'required|string|max:255',
        ]);

        $comment = Comment::create([
            'message_id' => $messageId,
            'user_id' => auth()->user()->id,
            'content' => $request->input('commentaire'),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully');
    }
}