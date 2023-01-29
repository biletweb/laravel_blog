<?php

namespace App\Http\Controllers\Main\Like;

use App\Http\Controllers\Controller;
use App\Service\Main\Like\LikeService;

class BaseController extends Controller
{
    public $service;

    public function __construct(LikeService $service)
    {
        $this->service = $service;
    }
}
