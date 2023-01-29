<?php

namespace App\Http\Controllers\Main\Like;

use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(Post $post)
    {
        $this->service->store($post);
        return redirect()->back();
    }
}
