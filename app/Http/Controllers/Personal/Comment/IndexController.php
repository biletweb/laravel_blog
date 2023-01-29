<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $comments = auth()->user()->comments()->where('answer_comment', null)->orderBy('id', 'DESC')->paginate(7);
        return view('personal.comment.index', compact('comments'));
    }
}
