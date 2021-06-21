<?php

namespace App\Services;

use App\Models\Like;

class HasLiked
{
    public function __construct($post_id)
    {
        $this->auth_id = auth()->id();
        $this->post_id = $post_id;
        $this->like = new Like();
    }

    public function execute()
    {
        $data = $this->like->get_likes([
            'user_id' => $this->auth_id,
            'post_id' => $this->post_id,
        ]);

        return count($data) > 0 ? true : false;
    }
}
