<?php

namespace App\Http\Controllers;

use App\Models\IndividualChat;
use App\Models\IndividualItem;

class IndividualChatController extends Controller
{
    public function index()
    {
        $messages = IndividualChat::all();
        $html = view('messenger.index', compact('messages'))->render();
        return response()->json(['html' => $html]);
    }
    
    public function show($id)
    {
        $chat = IndividualChat::find($id);
        if (!$chat) {
            $chat = IndividualChat::create([
                'from' => auth()->id(),
                'to' => $id
            ]);
        }
        $html = view('messenger.chatbox', compact('chat'))->render();
        return response()->json(['html' => $html]);
    }

    public function store()
    {
        $auth_id = auth()->id();
        $chat = IndividualChat::find(request('chat_id'));
        IndividualItem::create([
            'chat_id' => $chat->id,
            'content' => request('content'),
            'user_id' => $auth_id
        ]);
        return response()->json(['content' => request('content')]);
    }
}
