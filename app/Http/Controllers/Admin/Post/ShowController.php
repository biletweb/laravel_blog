<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $tags = [];
        foreach ($post->tags as $tag){
            $tags[] = $tag->title;
        }
        return view('admin.post.show', compact('post', 'tags'));
    }
}
