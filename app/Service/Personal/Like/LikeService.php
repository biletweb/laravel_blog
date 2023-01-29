<?php

namespace App\Service\Personal\Like;

class LikeService
{
    public function destroy($post)
    {
        auth()->user()->likedPosts()->detach($post->id);
    }
}
