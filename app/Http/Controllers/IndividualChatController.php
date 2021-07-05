<?php

namespace App\Http\Controllers;

use App\Models\IndividualChat;
use App\Models\IndividualItem;
use App\Models\IndividualChatImage;
use Illuminate\Database\Eloquent\Builder;

class IndividualChatController extends Controller
{
    private $individual_chat;

    public function __construct()
    {
        $this->individual_chat = new IndividualChat();
    }
    
    public function index()
    {
        $auth = auth()->user();
        $messages = $this->individual_chat->my_messages($auth->id);
        $html = view('messenger.index', compact('messages'))->render();
        return response()->json(['html' => $html]);
    }
    
    public function show($id)
    {
        $chat = IndividualChat::find($id);
        $html = view('messenger.chatbox', compact('chat'))->render();
        return response()->json(['html' => $html]);
    }

    public function store($user_id)
    {
        $chat = $this->individual_chat->find_message(auth()->id(), $user_id);
        if (empty($chat)) {
            $chat = IndividualChat::create(['from' => auth()->id(), 'to' => $user_id]);
        }
        $html = view('messenger.chatbox', compact('chat'))->render();
        return response()->json(['html' => $html]);
    }

    public function storeItem()
    {
        $auth_id = auth()->id();
        $chat = IndividualChat::find(request('chat_id'));
        $chat->update(['last_mess' => request('content')]);
        $chat_item = IndividualItem::create([
            'chat_id' => $chat->id,
            'content' => request('content'),
            'user_id' => $auth_id
        ]);
        if (request()->has('image')) {
            $chat_item->update(['content' => 'Image']);
            $chat->update(['last_mess' => 'Image']);
            $chat_image = IndividualChatImage::create(['chat_item' => $chat_item->id, 'image_path' => request('image')]);
        }
        return response()->json(['content' => request('content'), 'image' => @$chat_image->image_path]);
    }
}
