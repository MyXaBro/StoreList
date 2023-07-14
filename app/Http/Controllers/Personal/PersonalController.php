<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $data = [];
        $data['listsCount'] = $user->lists()->count();
        $data['tagsCount'] = $user->tags()->count();

        return view('personal.index', compact('data'));
    }
}
