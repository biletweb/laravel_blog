<?php

namespace App\Http\Controllers\Personal\Like;

use App\Http\Controllers\Controller;
use App\Service\Personal\Like\LikeService;

class BaseController extends Controller
{
    public $service;

    public function __construct(LikeService $service)
    {
        $this->service = $service;
    }
}
