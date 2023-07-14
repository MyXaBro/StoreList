<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            $user = auth()->user();
            $lists = $user->lists;
            $tags = $user->tags;

            return view('index', compact('lists', 'tags'));
        } else {
            return view('index');
        }
    }
}
