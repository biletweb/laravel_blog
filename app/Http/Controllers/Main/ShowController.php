<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $categories = Category::all();

        $relatedCount = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->count();
        if ($relatedCount > 3)
        {
            $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->get()->random(3);
        } else {
            $relatedPosts = Post::where('category_id', $post->category_id)->where('id', '!=', $post->id)->get();
        }

        $comments = $post->comments->sortByDesc('id');

        Carbon::setLocale('ru-RU');
        $date = Carbon::parse($post->created_at);

        return view('main.show', compact('post', 'categories', 'date', 'relatedPosts', 'comments'));
    }
}
