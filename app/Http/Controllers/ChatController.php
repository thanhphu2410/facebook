<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Chat;
use App\Models\ChatItem;
use App\Models\ChatUser;
use App\Models\ChatImage;

class ChatController extends Controller
{
    private $chat;
    private $chat_user;
    private $user;

    public function __construct()
    {
        $this->chat = new Chat();
        $this->chat_user = new ChatUser();
        $this->user = new User();
    }

    public function index()
    {
        $chat_ids = $this->chat_user->get_chat_users(['auth_id' => auth()->id()])->pluck('chat_id');
        $messages = $this->chat->get_chats(['ids' => $chat_ids]);
        $html = view('messenger.index', compact('messages'))->render();
        return response()->json(['html' => $html]);
    }

    public function create()
    {
        $users = $this->user->get_users(['ids' => auth()->user()->all_friends_ids()]);
        $html = view('messenger.new-message', compact('users'))->render();
        return response()->json(['html' => $html]);
    }

    public function store()
    {
        $user_ids = request('user_ids');
        $title = $this->user->get_users(['ids' => $user_ids])->implode('full_name', ', ');
        $user_ids[] = auth()->id();
        $chat = $this->chat->get_chats(['number' => count($user_ids), 'user_ids' => $user_ids])->first();
        
        if (empty($chat)) {
            $chat = Chat::create(['title' => $title]);
            foreach ($user_ids as $id) {
                ChatUser::create(['user_id' => $id, 'chat_id' => $chat->id]);
            }
        }
        $html = view('messenger.chatbox', compact('chat'))->render();
        return response()->json(['html' => $html]);
    }
    
    public function show(Chat $chat)
    {
        $html = view('messenger.chatbox', compact('chat'))->render();
        return response()->json(['html' => $html]);
    }

    public function storeItem()
    {
        $auth_id = auth()->id();
        $chat = $this->chat->find(request('chat_id'));
        $chat->update(['last_mess' => request('content')]);
        $chat_item = ChatItem::create([
            'chat_id' => $chat->id,
            'content' => request('content'),
            'user_id' => $auth_id
        ]);
        if (request()->has('image')) {
            $chat_item->update(['content' => 'Image']);
            $chat->update(['last_mess' => 'Image']);
            $chat_image = ChatImage::create(['chat_item' => $chat_item->id, 'image_path' => request('image')]);
        }
        return response()->json(['content' => request('content'), 'image' => @$chat_image->image_path]);
    }
}
