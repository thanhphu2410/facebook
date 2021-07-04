<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'body'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->hasMany('App\Models\PostImage');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    
    public function scopeUser_ids($query, $user_ids)
    {
        $query->whereIn('user_id', $user_ids);
        return $query;
    }

    public function get_posts($params = [])
    {
        $posts = $this->query()
                ->user_ids(@$params['user_ids'])
                ->latest()
                ->offset($params['offset'] ?? 0)
                ->take($params['take'] ?? 5)
                ->get();
        return $posts;
    }
}
