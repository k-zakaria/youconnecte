<?php

namespace App\Http\Controllers;

use App\Events\chatEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chat(Request $request){
        $message = $request->message;
        broadcast(new chatEvent($message));
    }

}
