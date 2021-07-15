<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    public function store()
    {
        $comment = Comment::create(request()->all());
        $html = view('comment.list', compact('comment'))->render();
        return response()->json(['html' => $html]);
    }
}
