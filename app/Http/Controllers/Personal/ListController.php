<?php

namespace App\Http\Controllers\Personal;

use App\Http\Requests\ListRequest;
use App\Http\Requests\UpdateListRequest;
use App\Models\Post;

class ListController extends BaseController
{
    public function list()
    {
            $user = auth()->user();
            $lists = $user->lists;

        return view('personal.list.index', compact('lists'));
    }

    public function createList()
    {
        $user = auth()->user();
        $tags = $user->tags;

        return view('personal.list.create', compact('tags'));
    }

    public function showList(Post $list)
    {
        return view('personal.list.show', compact('list'));
    }

    public function editList(Post $list)
    {
        $user = auth()->user();
        $tags = $user->tags;

        return view('personal.list.edit', compact('list', 'tags'));
    }

    public function saveList(ListRequest $request)
    {
        $data = $request->validated();

        $user = auth()->user();
        $data['user_id'] = $user->id;

        $this->service->store($data);

        return response()->json(['success'=>'Список добавлен!']);
    }

    public function updateList(UpdateListRequest $request, Post $list)
    {
        $data = $request->validated();

        $this->service->update($data, $list);

        return redirect()->route('list.index');
    }

    public function deleteList(Post $list)
    {
        $list->delete();
        return redirect()->route('list.index');
    }
}
