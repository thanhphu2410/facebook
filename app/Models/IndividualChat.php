<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function my_messages($auth_id)
    {
        $messages = $this->where(function (Builder $query) use ($auth_id) {
            return $query->where('from', $auth_id);
        })->orWhere(function (Builder $query) use ($auth_id) {
            return $query->where('to', $auth_id);
        })->get();
        
        return $messages;
    }

    public function find_message($auth_id, $user_id)
    {
        $message = $this->where(function (Builder $query) use ($auth_id, $user_id) {
            return $query->where('from', $auth_id)->where('to', $user_id);
        })->orWhere(function (Builder $query) use ($auth_id, $user_id) {
            return $query->where('from', $user_id)->where('to', $auth_id);
        })->first();
        
        return $message;
    }
}
