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
        $user_ids = auth()->user()->all_friends_ids();
        $user_ids[] = auth()->id();
        $posts = $this->post->get_posts(['user_ids' => $user_ids, 'paginate' => 5]);
        return view('home.index', compact('posts'));
    }
}
