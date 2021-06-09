<?php

namespace App\Http\Controllers;

use App\User;

class ProfileController extends Controller
{
    public function edit(User $profile)
    {
        return view('profile.edit', compact('profile'));
    }
}
