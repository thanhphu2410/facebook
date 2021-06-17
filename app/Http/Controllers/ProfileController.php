<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Post;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function show(User $profile)
    {
        $auth = $this->auth();
        $check = ($profile->id == $auth->id) ? 'edit' : 'show';
        if (request()->ajax()) {
            $html = view("profile.ajax.$check", compact('profile'))->render();
            return response()->json([
                'html' => $html,
                'isMyProfile' => $profile->id == $auth->id
            ]);
        }
        return view("profile.$check.profile", compact('profile', 'auth'));
    }

    public function tabIntroduction(User $profile)
    {
        $check = ($profile->id == $this->auth()->id) ? 'edit' : 'show';
        $html = view("profile.$check.tab.introduction", compact('profile'))->render();
        return response()->json(['html' => $html]);
    }

    public function tabMyPosts(User $profile)
    {
        $check = ($profile->id == $this->auth()->id) ? 'edit' : 'show';
        $html = view("profile.$check.tab.my-posts")->render();
        return response()->json(['html' => $html]);
    }

    public function update(User $profile)
    {
        $profile->update(request()->all());
        if (request('view_name')) {
            $view_name = str_replace('_', '.', request('view_name'));
            $html = view($view_name, compact('profile'))->render();
        }
        return response()->json(['html' => $html ?? '']);
    }
}
