<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['categories'] = Category::all()->count();
        $data['categoriesToday'] = Category::where('created_at', '>', date('Y-m-d 00:00:00'))->count();
        $data['tags'] = Tag::all()->count();
        $data['tagsToday'] = Tag::where('created_at', '>', date('Y-m-d 00:00:00'))->count();
        $data['posts'] = Post::all()->count();
        $data['postsToday'] = Post::where('created_at', '>', date('Y-m-d 00:00:00'))->count();
        $data['users'] = User::all()->count();
        $data['usersToday'] = User::where('created_at', '>', date('Y-m-d 00:00:00'))->count();
        return view('admin.main.index', compact('data'));
    }
}
