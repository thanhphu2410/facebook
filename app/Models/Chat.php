<?php

namespace App\Models;

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

    /*
        ===============================METHODS===============================
    */

    public function get_chats($params = [])
    {
        $datas = $this->query()
                ->ids(@$params['ids'])
                ->latest()
                ->get();
        return $datas;
    }
}
