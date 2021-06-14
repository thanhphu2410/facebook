<?php

namespace App;

use App\Models\Friend;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'last_name', 'first_name', 'full_name', 'province_id', 'district_id', 'ward_id', 'phone', 'address',
        'avatar', 'cover_photo', 'email', 'date_of_birth', 'gender', 'email_verified_at', 'password', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }

    public function district()
    {
        return $this->belongsTo('App\Models\District');
    }

    public function ward()
    {
        return $this->belongsTo('App\Models\Ward');
    }

    public function friends()
    {
        return $this->hasMany('App\Models\Friend', 'from');
    }

    public function all_friends()
    {
        return Friend::where(function (Builder $query) {
            return $query->where('from', $this->id);
        })->orWhere(function (Builder $query) {
            return $query->where('to', $this->id);
        })->get();
    }

    public function areFriends($user_id)
    {
        return Friend::where(function (Builder $query) use ($user_id) {
            return $query->where('from', $this->id)->where('to', $user_id)->where('status', 'A');
        })->orWhere(function (Builder $query) use ($user_id) {
            return $query->where('from', $user_id)->where('to', $this->id)->where('status', 'A');
        })->first();
    }

    public function hasAdded($user_id)
    {
        return Friend::where('from', $this->id)->where('to', $user_id)->first();
    }

    public function notAccepted($user_id)
    {
        $check = Friend::where('from', $user_id)->where('to', $this->id)->where('status', 'P')->get();
        return $check->count() ? true : false;
    }

    public function getFullAddressAttribute()
    {
        $address = array_filter([
            $this->address,
            @$this->ward->prefix." ".@$this->ward->name,
            @$this->district->prefix." ".@$this->district->name,
            @$this->province->name,
            "Việt Nam"
        ], function ($value) {
            return !empty(str_replace(' ', '', $value));
        });
        
        return implode(", ", $address);
    }
}
