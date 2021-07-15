<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    /*
        ===============================RELATIONSHIPS===============================
    */

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /*
        ===============================MUTATORS===============================
    */

    public function setImagePathAttribute()
    {
        if (request()->has('image_path')) {
            $path = store_file(request('image_path'), 'comment');
            $this->attributes['image_path'] = '/' . $path;
        }
    }
}
