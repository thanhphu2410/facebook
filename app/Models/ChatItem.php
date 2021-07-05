<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatItem extends Model
{
    protected $table = 'chat_items';
    protected $guarded = [];

    /*
        ===============================RELATIONSHIPS===============================
    */

    public function image()
    {
        return $this->hasOne('App\Models\ChatImage', 'chat_item');
    }
}
