<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Service\Admin\Tag\TagService;

class BaseController extends Controller
{
    public $service;

    public function __construct(TagService $service)
    {
        $this->service = $service;
    }
}
