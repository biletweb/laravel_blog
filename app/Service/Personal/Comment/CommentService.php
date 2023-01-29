<?php

namespace App\Service\Personal\Comment;

class CommentService
{
    public function update($data, $comment)
    {
        $comment->update($data);
    }

    public function destroy($comment)
    {
        $comment->delete();
    }
}
