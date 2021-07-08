<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';
    protected $guarded = [];

    /*
        ===============================RELATIONSHIPS===============================
    */

    public function chat_users()
    {
        return $this->hasMany('App\Models\ChatUser', 'chat_id', 'id');
    }

    public function items()
    {
        return $this->hasMany('App\Models\ChatItem', 'chat_id');
    }

    /*
        ===============================LOCAL SCOPE===============================
    */

    public function scopeIds($query, $ids)
    {
        if (!empty($ids)) {
            $query->whereIn('id', $ids);
        }
        return $query;
    }

    public function scopeUser_ids($query, $user_ids)
    {
        if (!empty($user_ids)) {
            foreach ($user_ids as $user_id) {
                $query->whereHas('chat_users', function ($query) use ($user_id) {
                    $query->where('user_id', $user_id);
                });
            }
        }
        return $query;
    }

    public function scopeNumber_of_users($query, $number)
    {
        if (!empty($number)) {
            $query->has('chat_users', '=', $number);
        }
        return $query;
    }

    /*
        ===============================ASSESORS===============================
    */

    public function getRandomUserAttribute()
    {
        $chat_users = $this->chat_users->where('user_id', '!=', auth()->id());
        $rand = array_rand($chat_users->toArray());
        return $chat_users[$rand]->user;
    }

    /*
        ===============================MUTATORS===============================
    */

    public function setLastMessAttribute($value)
    {
        if (strlen($value) > 15) {
            $this->attributes['last_mess'] = substr($value, 0, 15) . "...";
        } else {
            $this->attributes['last_mess'] = $value;
        }
    }

    public function setTitleAttribute($value)
    {
        if (strlen($value) > 15) {
            $this->attributes['title'] = substr($value, 0, 27) . "...";
        } else {
            $this->attributes['title'] = $value;
        }
    }

    /*
        ===============================METHODS===============================
    */

    public function get_chats($params = [])
    {
        $datas = $this->query()
                ->ids(@$params['ids'])
                ->user_ids(@$params['user_ids'])
                ->number_of_users(@$params['number'])
                ->orderBy('updated_at', 'desc')
                ->get();
        return $datas;
    }
}
