<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filter(Request $request)
    {
        $tagIds = $request->input('tag_ids');

        $filteredLists = Post::whereHas('tags', function ($query) use ($tagIds) {
            $query->whereIn('tags.id', $tagIds);
        })->get();

        $user = auth()->user();
        $tags = $user->tags;

        return view('filter', compact('filteredLists', 'tags'));
    }
}

