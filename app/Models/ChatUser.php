<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    protected $table = 'chat_users';
    protected $guarded = [];

    /*
        ===============================RELATIONSHIPS===============================
    */

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /*
        ===============================LOCAL SCOPE===============================
    */

    public function scopeAuth_id($query, $id)
    {
        if (!empty($id)) {
            $query->where('user_id', $id);
        }
        return $query;
    }

    /*
        ===============================METHODS===============================
    */

    public function get_chat_users($params = [])
    {
        $datas = $this->query()
                ->auth_id(@$params['auth_id'])
                ->latest()
                ->get();
        return $datas;
    }
}
