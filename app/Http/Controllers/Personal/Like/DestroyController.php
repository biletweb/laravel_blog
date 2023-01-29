<?php

namespace App\Http\Controllers\Personal\Like;

use App\Models\Post;

class DestroyController extends BaseController
{
    public function __invoke(Post $post)
    {
        $this->service->destroy($post);
        return redirect()->route('personal.like.index')->with(['success' => 'Лайк удален']);
    }
}
