<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('user', 'comments')->latest()->get();
    
        return view('posts.index', compact('messages'));
    }    

    public function store(Request $request)
    {


        $data = $request->validate([
            'content' => 'required|string|max:255', 
        ]);
        $validatedData = $request->validate([
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
  return redirect()->route('post.index')->with('success', 'post deleted');

  }


    public function like()
{
    $message = Message::find(request()->input('id'));

    if ($message) {
        $existingLike = Like::where([
            'user_id' => auth()->user()->id,
            'message_id' => $message->id
        ])->first();

        if ($existingLike) {
            $existingLike->delete();
            return  redirect()->back()->with('success', 'poste publié binaja7');
        } else {
            $like = new Like();
            $like->user_id = auth()->user()->id;
            $like->message_id = $message->id;
            $like->save();
            return  redirect()->back()->with('success', 'poste publié binaja7');
        }

        
    } else {
        return response()->json(['error' => 'Message not found'], 404);
    }
}

}