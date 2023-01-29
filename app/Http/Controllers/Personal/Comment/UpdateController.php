<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $this->service->update($data, $comment);
        return redirect()->route('personal.comment.index')->with(['success' => 'Комментарий обновлен']);
    }
}
