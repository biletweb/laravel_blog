<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->likedPosts()->orderBy('id', 'DESC')->paginate(7);
        return view('personal.like.index', compact('posts'));
    }
}
