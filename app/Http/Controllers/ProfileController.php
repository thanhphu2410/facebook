<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Province;

class ProfileController extends Controller
{
    public function edit(User $profile)
    {
        $html = view('profile.edit', compact('profile'))->render();
        return response()->json([
            'html' => $html,
            'isMyProfile' => $profile->id == auth()->id()
        ]);
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
