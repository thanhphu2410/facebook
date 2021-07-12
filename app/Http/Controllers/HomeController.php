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
        $auth = auth()->user();
        $user_ids = $auth->all_friends_ids();
        $user_ids[] = $auth->id;
        $posts = $this->post->get_posts(['user_ids' => $user_ids, 'paginate' => 5]);
        $friends = $auth->all_friends()->take(9);
        return view('home.index', compact('posts', 'friends'));
    }
}
