<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        $lists = Post::where('title', 'like', "%$search%")
            ->orWhereHas('tags', function ($query) use ($search) {
                $query->where('title', 'like', "%$search%");
            })
            ->get();

        return view('search', compact('lists', 'search'));
    }
}

