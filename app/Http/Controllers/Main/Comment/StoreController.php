<?php

namespace App\Http\Controllers\Main\Comment;

use App\Http\Requests\Main\Comment\StoreRequest;
use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->store($data, $post);
        return redirect()->route('main.post', $post->id);
    }
}
