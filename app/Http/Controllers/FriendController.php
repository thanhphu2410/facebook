<?php

namespace App\Http\Controllers;

use App\User;

class FriendController extends Controller
{
    public function store(User $user)
    {
        $auth = auth()->user();
        if (!$auth->hasAdded($user->id)) {
            $auth->friends()->create(['to' => $user->id]);
        }
        $cancel_friend_url = route('cancel-friend', [$user->id]);
        return response()->json(['url' => $cancel_friend_url]);
    }

    public function destroy(User $user)
    {
        $auth = auth()->user();
        $auth->hasAdded($user->id)->delete();
        $add_friend_url = route('add-friend', [$user->id]);
        return response()->json(['url' => $add_friend_url]);
    }
}
