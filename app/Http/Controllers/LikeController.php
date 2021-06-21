<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        $this->auth()->likes()->create(['post_id' => $post->id]);
        return response()->json(['likes' => count($post->likes)]);
    }

    public function destroy(Post $post, Like $like)
    {
        $like->get_likes([
            'user_id' => $this->auth()->id,
            'post_id' => $post->id
        ])->first()->delete();
        return response()->json(['likes' => count($post->likes)]);
    }
}
