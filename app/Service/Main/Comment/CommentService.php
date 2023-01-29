<?php

namespace App\Service\Main\Comment;

use App\Models\Comment;

class CommentService
{
    public function store($data, $post)
    {
        $data['post_id'] = $post->id;
        $data['user_id'] = auth()->user()->id;
        Comment::create($data);
    }
}
