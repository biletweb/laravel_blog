<?php

namespace App\Service\Main\Like;

class LikeService
{
    public function store($post)
    {
        auth()->user()->likedPosts()->toggle($post->id);
    }
}
