<?php

namespace App\Service\Admin\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $tag_id = $data['tag_id'];
            unset($data['tag_id']);

            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tag_id);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();

            $tag_id = $data['tag_id'];
            unset($data['tag_id']);

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post->update($data);
            $post->tags()->sync($tag_id);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            abort(500);
        }

        return $post;
    }

    public function destroy($post)
    {
        try {
            DB::beginTransaction();

            $post->delete();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            abort(500);
        }
    }
}
