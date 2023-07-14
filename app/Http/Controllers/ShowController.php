<?php

namespace App\Http\Controllers;

use App\Models\Post;

class ShowController extends Controller
{
    public function index(Post $list)
    {
        $user = auth()->user();
        $tags = $user->tags;

        return view('show', compact('list', 'tags'));
    }
}
