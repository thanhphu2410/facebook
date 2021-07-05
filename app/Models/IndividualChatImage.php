<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualChatImage extends Model
{
    protected $table = 'individual_chat_images';
    protected $guarded = [];

    /*
        ===============================MUTATORS===============================
    */

    public function setImagePathAttribute()
    {
        if (request()->has('image')) {
            $path = store_file(request('image'), 'individual-chat-images');
            $this->attributes['image_path'] = '/' . $path;
        }
    }
}
