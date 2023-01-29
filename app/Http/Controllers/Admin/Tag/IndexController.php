<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::orderBy('id', 'DESC')->paginate(7);
        return view('admin.tag.index', compact('tags'));
    }
}
