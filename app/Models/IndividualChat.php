<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualChat extends Model
{
    protected $table = 'individual_chat';
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany('App\Models\IndividualItem', 'chat_id');
    }

    public function from_user()
    {
        return $this->belongsTo('App\User', 'from');
    }

    public function to_user()
    {
        return $this->belongsTo('App\User', 'to');
    }

    public function getUserAttribute()
    {
        return $this->from == auth()->id() ? $this->to_user : $this->from_user;
    }
}
