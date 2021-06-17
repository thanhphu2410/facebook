<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $friend_ids = $this->auth()->all_ids_friends();
        $posts = Post::whereIn('user_id', $friend_ids)->latest()->get();
        if (request()->ajax()) {
            $html = view('home.ajax-index', compact('posts'))->render();
            return response()->json(['html' => $html]);
        }
        return view('home.index', compact('posts'));
    }
}
