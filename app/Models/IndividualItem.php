<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualItem extends Model
{
    protected $table = 'individual_items';
    protected $guarded = [];

    public function image()
    {
        return $this->hasOne('App\Models\IndividualChatImage', 'chat_item');
    }
}
