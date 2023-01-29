<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
{
    public function __invoke($category)
    {
        $categories = Category::all();
        $posts = Post::where('category_id', $category)->orderBy('id', 'DESC')->paginate(9);
        $postCategory = Category::where('id', $category)->first();

        $postsCount = Post::all()->count();
        if ($postsCount > 4) {
            $postsRandom = Post::get()->random(4);
        } else {
            $postsRandom = Post::all();
        }

        $likedCount = Post::withCount('likedUsers')->get()->count();
        if ($likedCount > 8) {
            $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(8);
        } else {
            $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get();
        }

        return view('main.index', compact('posts', 'postsRandom', 'categories', 'likedPosts', 'postCategory'));
    }
}
