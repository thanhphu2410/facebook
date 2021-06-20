<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $posts = $this->post->get_posts(['user_ids' => $this->auth()->allFriendIds()]);
        if (request()->ajax()) {
            $html = view('home.ajax-index', compact('posts'))->render();
            return response()->json(['html' => $html]);
        }
        return view('home.index', compact('posts'));
    }
}
