<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Models\Comment;

class DestroyController extends BaseController
{
    public function __invoke(Comment $comment)
    {
        $this->service->destroy($comment);
        return redirect()->route('personal.comment.index')->with(['success' => 'Комментарий удален']);
    }
}
