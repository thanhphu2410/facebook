<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    public function scopePostId($query, $post_id)
    {
        if (!empty($post_id)) {
            $query->where('post_id', $post_id);
        }
        return $query;
    }

    public function scopeUserId($query, $user_id)
    {
        if (!empty($user_id)) {
            $query->where('user_id', $user_id);
        }
        return $query;
    }

    public function get_likes($params = [])
    {
        $posts = $this->query()
                ->UserId(@$params['user_id'])
                ->PostId(@$params['post_id'])
                ->get();
        return $posts;
    }
}
