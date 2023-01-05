<?php

namespace Programm\App\Controllers;

use Programm\App\Controllers\Controller;
use Programm\App\Services\EmployeeService;
use Programm\App\Services\Service;

/**
 * EmployeeController
 */
class EmployeeController extends Controller
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        protected Service $service = new EmployeeService()
    ) {}
}