<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){
        return view('chat');
    }

    public function fetchMessages(){
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        
        $user_id = Auth::id();
        $messages =  Message::with('user')->where('user_id', $user_id)->create([
            'message' => $request->input('message')
        ]);
        

        broadcast(new MessageSent($user, $messages))->toOthers();
        return ['status' => 'Message Sent!'];
    }
}
