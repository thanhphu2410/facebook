<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'body'];

    /*
        ===============================RELATIONSHIPS===============================
    */

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

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /*
        ===============================LOCAL SCOPE===============================
    */
    
    public function scopeUser_ids($query, $user_ids)
    {
        $query->whereIn('user_id', $user_ids);
        return $query;
    }

    /*
        ===============================METHODS===============================
    */

    public function get_posts($params = [])
    {
        $posts = $this->query()
                ->user_ids(@$params['user_ids'])
                ->latest();
        return !empty(@$params['paginate']) ? $posts->paginate(@$params['paginate']) : $posts->get();
    }
}
