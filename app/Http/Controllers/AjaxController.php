<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Post;
use App\Models\District;
use App\Models\Province;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->post = new Post();
    }
    
    public function getDistricts()
    {
        $province = Province::find(request('province_id'));
        $province->load('districts');
        return response()->json($province->districts);
    }
    
    public function getWards()
    {
        $district = District::find(request('district_id'));
        $district->load('wards');
        return response()->json($district->wards);
    }

    public function getProfiles()
    {
        $name = request('name');
        $profiles = User::where('full_name', 'LIKE', '%'.$name.'%')->where('id', '!=', $this->auth()->id)->get();
        if (empty($name)) {
            $profiles = [];
        }
        $html = view('search.list-result', compact('profiles'))->render();
        return response()->json(['html' => $html]);
    }

    public function getMorePosts()
    {
        $posts = $this->post->get_posts([
            'user_ids' => explode(",", request('for')),
            'offset' => request('offset'),
            'take' => request('take')
        ]);
        $html = "";
        foreach ($posts as $item) {
            $html .= view('home.post', compact('item'))->render();
        }
        return response()->json(['html' => $html]);
    }
}
