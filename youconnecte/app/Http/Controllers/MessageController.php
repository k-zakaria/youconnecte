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

        $data = $request->validate([
            'content' => 'required|string|max:255', 
            'media' => 'image|mimes:jpeg,png,jpg,gif|max:2000000',
        ]);

        $message = new Message();
        $message->user_id = auth()->user()->id;
        $message->content = $data['content'];


        if ($request->hasFile('media')) {
            $mediaPath = $request->file('media')->store('uploads', 'public');
            $message->media = $mediaPath;
        }

        $message->save();

        return redirect()->back()->with('success', 'poste publié binaja7');
    }


    public function edit($id) {


        $message = Message::find($id);
        return view('posts.edit', compact('message'));
    }

  public function update(Request $request, $id){

    $data = $request->validate([
        'content' => 'required|string|max:255', 
        'media' => 'image|mimes:jpeg,png,jpg,gif|max:2000000',
    ]);

    $message = Message::find($id);
    $message->content = $data['content'];

    if ($request->hasFile('media')) {
        $mediaPath = $request->file('media')->store('uploads', 'public');
        $message->media = $mediaPath;
    }
    $message->save();
    return redirect()->route('post.index')->with('success', 'post updated');

  }

  public function destroy($id) {

    $message = Message::find($id);
    $message->delete();
  return redirect()->route('post.index')->with('success', 'Post deleted successfully.');

  }
}