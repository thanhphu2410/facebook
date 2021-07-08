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

    /*
        ===============================RELATIONSHIPS===============================
    */

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

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    /*
        ===============================LOCAL SCOPE===============================
    */

    public function scopeName($query, $name)
    {
        if (!empty($name)) {
            $query->where('full_name', 'LIKE', '%'.$name.'%');
        }
        return $query;
    }

    public function scopeExcept_ids($query, $ids)
    {
        if (!empty($ids)) {
            if (is_int($ids)) {
                $ids = [$ids]; // case truyền vào một id
            }
            $query->whereNotIn('id', $ids);
        }
        return $query;
    }

    public function scopeIds($query, $ids)
    {
        if (!empty($ids)) {
            $query->whereIn('id', $ids);
        }
        return $query;
    }

    /*
        ===============================ASSESORS===============================
    */

    public function getFullAddressAttribute()
    {
        $address = array_filter([
            $this->address,
            @$this->ward->prefix." ".@$this->ward->name,
            @$this->district->prefix." ".@$this->district->name,
            @$this->province->name
        ], function ($value) {
            return !empty(str_replace(' ', '', $value));
        });
        
        return implode(", ", $address);
    }

    public function getAvatarPathAttribute()
    {
        if (file_exists(public_path() . $this->avatar)) {
            return $this->avatar;
        }
        return '/images/avatar.png';
    }
    
    public function getCoverPathAttribute()
    {
        if (file_exists(public_path() . $this->cover_photo)) {
            return $this->cover_photo;
        }
        return '/images/cover-photo.jpeg';
    }

    /*
        ===============================MUTATORS===============================
    */

    public function setAvatarAttribute($value)
    {
        if (request()->has('avatar')) {
            delete_file($this->avatar);
            $path = store_file(request('avatar'), 'avatar');
            $this->attributes['avatar'] = '/' . $path;
        } else {
            $this->attributes['avatar'] = $value;
        }
    }

    public function setCoverPhotoAttribute($value)
    {
        if (request()->has('cover_photo')) {
            delete_file($this->cover_photo);
            $path = store_file(request('cover_photo'), 'cover-photo');
            $this->attributes['cover_photo'] = '/' . $path;
        } else {
            $this->attributes['cover_photo'] = $value;
        }
    }

    /*
        ===============================METHODS===============================
    */

    public function all_friends()
    {
        return Friend::where(function (Builder $query) {
            return $query->where('from', $this->id)->where('status', 'A');
        })->orWhere(function (Builder $query) {
            return $query->where('to', $this->id)->where('status', 'A');
        })->get();
    }

    public function all_friends_ids()
    {
        $results = [];
        foreach ($this->all_friends() as $friend) {
            if (!in_array($friend->from, $results) && $friend->from != $this->id) {
                $results[] = $friend->from;
            }
            if (!in_array($friend->to, $results) && $friend->to != $this->id) {
                $results[] = $friend->to;
            }
        }
        return $results;
    }

    public function get_users($params = [])
    {
        $users = $this->query()
                ->name(@$params['name'])
                ->except_ids(@$params['except'])
                ->ids(@$params['ids'])
                ->latest()
                ->get();
        return $users;
    }
}
