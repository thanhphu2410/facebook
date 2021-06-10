<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $html = view('home.ajax-index')->render();
            return response()->json(['html' => $html]);
        }
        return view('home.index');
    }
}
