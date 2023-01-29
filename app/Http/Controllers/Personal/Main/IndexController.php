<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->likedPosts()->count();
        $comments = auth()->user()->comments()->where('answer_comment', null)->count();
        return view('personal.main.index', compact('posts', 'comments'));
    }
}
