<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Service\Personal\Comment\CommentService;

class BaseController extends Controller
{
    public $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }
}
