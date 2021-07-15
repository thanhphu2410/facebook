<?php

namespace App\Http\Controllers;

use App\User;

class PostController extends Controller
{
    public function store()
    {
        $user = User::findOrFail(request('user_id'));
        $post = $user->posts()->create(request()->all());
        foreach (request('image_path', []) as $image) {
            $path = store_file($image, 'post-images');
            $post->images()->create(['image_path' => '/' . $path]);
        }
        $html = view('home.post', ['post' => $post])->render();
        return response()->json(['html' => $html]);
    }
}
