<?php

namespace App\Http\Controllers\Main\Comment;

use App\Http\Controllers\Controller;
use App\Service\Main\Comment\CommentService;

class BaseController extends Controller
{
    public $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }
}
