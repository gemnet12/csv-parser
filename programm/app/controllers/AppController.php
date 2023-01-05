<?php

namespace Programm\App\Controllers;

use Programm\App\Controllers\Controller;
use Programm\App\Services\AppService;
use Programm\App\Services\Service;

class AppController extends Controller
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        protected Service $service = new AppService()
    ) {}
}