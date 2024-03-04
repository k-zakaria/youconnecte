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

        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->message_id = $messageId;
        $comment->content = $request->input('commentaire');
        $comment->save();

        return redirect()->back()->with('success', 'comment added');
    }
}
