<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'friends';
    protected $guarded = [];

    public function from_user()
    {
        return $this->belongsTo('App\User', 'from');
    }

    public function to_user()
    {
        return $this->belongsTo('App\User', 'to');
    }
}
