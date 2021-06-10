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
        $provinces = Province::all();
        $html = view('profile.tab.introduction', compact('provinces', 'profile'))->render();
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
        return response()->json(['success' => request('province_id')]);
    }
}
