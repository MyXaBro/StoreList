<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function tag()
    {
        $user = auth()->user();
        $tags = $user->tags;

        return view('personal.tag.index', compact('tags'));
    }

    public function createTag()
    {
        return view('personal.tag.create');
    }

    public function showTag(Tag $tag)
    {
        return view('personal.tag.show', compact('tag'));
    }

    public function editTag(Tag $tag)
    {
        return view('personal.tag.edit', compact('tag'));
    }

    public function saveTag(TagRequest $request)
    {
        $data = $request->validated();

        $user = auth()->user();
        $data['user_id'] = $user->id;

        Tag::firstOrCreate($data);

        return redirect()->route('tag.index');
    }

    public function updateTag(UpdateTagRequest $request, Tag $tag)
    {
        $data = $request->validated();

        $tag->update($data);

        return redirect()->route('tag.index');
    }

    public function deleteTag(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
