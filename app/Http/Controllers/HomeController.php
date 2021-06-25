<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\IndividualChat;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $posts = $this->post->get_posts(['user_ids' => auth()->user()->allFriendIds()]);
        if (request()->ajax()) {
            $html = view('home.ajax-index', compact('posts'))->render();
            return response()->json(['html' => $html]);
        }
        return view('home.index', compact('posts'));
    }
}
