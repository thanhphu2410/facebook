<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    public function show(User $profile)
    {
        $auth = auth()->user();
        $check = ($profile->id == $auth->id) ? 'edit' : 'show';
        if (request()->ajax()) {
            $html = view('profile.ajax.'.$check, compact('profile'))->render();
            return response()->json([
                'html' => $html,
                'isMyProfile' => $profile->id == $auth->id
            ]);
        }
        return view('profile.'.$check, compact('profile', 'auth'));
    }

    public function tabIntroduction(User $profile)
    {
        $html = view('profile.tab.introduction', compact('profile'))->render();
        return response()->json(['html' => $html]);
    }

    public function tabMyPosts(User $profile)
    {
        $html = view('profile.tab.my-posts')->render();
        return response()->json(['html' => $html]);
    }

    public function update(User $profile)
    {
        $profile->update(request()->all());
        $view_name = str_replace('_', '.', request('view_name'));
        $html = view($view_name, compact('profile'))->render();
        return response()->json(['html' => $html]);
    }
}
