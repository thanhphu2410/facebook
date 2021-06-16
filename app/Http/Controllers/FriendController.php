<?php

namespace App\Http\Controllers;

use App\User;

class FriendController extends Controller
{
    public function store(User $user)
    {
        $fr = fr_helper($user->id);
        if (!$fr->hasAdded()) {
            $fr->newRelationship();
        }
        $cancel_friend_url = route('cancel-friend', [$user->id]);
        return response()->json(['url' => $cancel_friend_url]);
    }

    public function accept(User $user)
    {
        fr_helper($user->id)->accept();
        $add_friend_url = route('add-friend', [$user->id]);
        return response()->json(['url' => $add_friend_url]);
    }

    public function destroy(User $user)
    {
        fr_helper($user->id)->unfriend();
        $add_friend_url = route('add-friend', [$user->id]);
        return response()->json(['url' => $add_friend_url]);
    }
}
