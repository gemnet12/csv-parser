<?php

namespace Programm\App\Controllers;

use Programm\App\Controllers\Controller;
use Programm\App\Services\DepartmentService;
use Programm\App\Services\Service;

/**
 * DepartmentController
 */
class DepartmentController extends Controller
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        protected Service $service = new DepartmentService()
    ) {}
}