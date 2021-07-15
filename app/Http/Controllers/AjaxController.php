<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Chat;
use App\Models\Post;
use App\Models\District;
use App\Models\Province;

class AjaxController extends Controller
{
    private $post;
    private $user;
    private $chat;
    
    public function __construct()
    {
        $this->post = new Post();
        $this->user = new User();
        $this->chat = new Chat();
    }
    
    public function getDistricts()
    {
        $province = Province::find(request('province_id'));
        $province->load('districts');
        return response()->json($province->districts);
    }
    
    public function getWards()
    {
        $district = District::find(request('district_id'));
        $district->load('wards');
        return response()->json($district->wards);
    }

    public function getProfiles()
    {
        $name = request('name');
        $profiles = $this->user->get_users(['name' => $name, 'except' => auth()->id()]);
        if (empty($name)) {
            $profiles = [];
        }
        $html = view('search.list-result', compact('profiles'))->render();
        return response()->json(['html' => $html]);
    }

    public function getMessages()
    {
        $name = request('name');
        if (empty($name)) {
            $messages = $this->chat->get_chats(['user_ids' => [auth()->id()]]);
            $html = view('messenger.list-message', compact('messages'))->render();
        } else {
            $profiles = $this->user->get_users(['name' => $name, 'except' => auth()->id()]);
            $html = view('messenger.search-result', compact('profiles'))->render();
        }
        return response()->json(['html' => $html]);
    }

    public function getMorePosts()
    {
        $posts = $this->post->get_posts([
            'user_ids' => explode(",", request('for')),
            'paginate' => 5
        ]);
        $html = "";
        foreach ($posts as $post) {
            $html .= view('home.post', compact('post'))->render();
        }
        return response()->json(['html' => $html]);
    }
}
