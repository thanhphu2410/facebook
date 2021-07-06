<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatImage extends Model
{
    protected $table = 'chat_images';
    protected $guarded = [];

    /*
        ===============================MUTATORS===============================
    */

    public function setImagePathAttribute()
    {
        if (request()->has('image')) {
            $path = store_file(request('image'), 'chat-images');
            $this->attributes['image_path'] = '/' . $path;
        }
    }
}
