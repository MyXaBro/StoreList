<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        DB::beginTransaction();
        try {
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            $list = Post::create($data);

            if (isset($data['tag_ids'])) {
                $list->tags()->sync($tagIds);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $list)
    {
        DB::beginTransaction();
        try {
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            $list->update($data);

            if (isset($data['tag_ids'])) {
                $list->tags()->sync($tagIds);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $list;
    }
}

