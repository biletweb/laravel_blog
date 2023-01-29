<?php

namespace App\Service\Main\Answer;

use App\Models\Comment;

class AnswerService
{
    public function store($data)
    {
        Comment::create($data);
    }
}
