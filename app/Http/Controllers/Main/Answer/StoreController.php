<?php

namespace App\Http\Controllers\Main\Answer;

use App\Http\Requests\Main\Answer\StoreRequest;
use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('main.post', $post->id);
    }
}
