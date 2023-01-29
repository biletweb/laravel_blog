<?php

namespace App\Http\Controllers\Main\Answer;

use App\Http\Controllers\Controller;
use App\Service\Main\Answer\AnswerService;


class BaseController extends Controller
{
    public $service;

    public function __construct(AnswerService $service)
    {
        $this->service = $service;
    }
}
