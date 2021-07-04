<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    private $post;
    
    public function __construct()
    {
        $this->post = new Post();
    }

    public function index()
    {
        $posts = $this->post->get_posts(['user_ids' => auth()->user()->all_friends_ids()]);
        return view('home.index', compact('posts'));
    }
}
