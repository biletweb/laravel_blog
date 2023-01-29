<?php

namespace App\Service\Admin\Tag;

use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagService
{
    public function store($data)
    {
        Tag::firstOrCreate($data);
    }

    public function update($data, $tag)
    {
        $tag->update($data);
        return $tag;
    }

    public function destroy($tag)
    {
        try {
            DB::beginTransaction();

            PostTag::where('tag_id', $tag->id)->delete();
            $tag->delete();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            abort(500);
        }
    }
}
