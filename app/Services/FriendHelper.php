<?php

namespace App\Services;

use App\Models\Friend;
use Illuminate\Database\Eloquent\Builder;

class FriendHelper
{
    public function __construct($user_id)
    {
        $this->auth_id = auth()->id();
        $this->user_id = $user_id;
    }

    public function find_relationship()
    {
        return Friend::where(function (Builder $query) {
            return $query->where('from', $this->auth_id)->where('to', $this->user_id);
        })->orWhere(function (Builder $query) {
            return $query->where('from', $this->user_id)->where('to', $this->auth_id);
        })->first();
    }

    public function areFriends()
    {
        return @$this->find_relationship()->status == 'A';
    }

    public function hasAdded()
    {
        return @$this->find_relationship()->from == $this->auth_id; // check xem đã add friend ông này chưa
    }

    public function notAccepted()
    {
        $fr = $this->find_relationship();
        return (@$fr->from == $this->user_id) && (@$fr->status = 'P'); // check xem đã accept friend ông này chưa
    }

    public function unfriend()
    {
        return @$this->find_relationship()->delete();
    }

    public function accept()
    {
        return @$this->find_relationship()->update(['status' => 'A']);
    }

    public function newRelationship()
    {
        $fr = Friend::create([
            'from' => $this->auth_id,
            'to' => $this->user_id
        ]);
        return $fr;
    }
}
