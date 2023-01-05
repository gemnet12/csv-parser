<?php

namespace Programm\App\Services;

use Programm\App\Models\Employee;
use Programm\App\Models\Model;

/**
 * EmployeeService
 */
class EmployeeService extends Service
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        protected Model $model = new Employee()
    ) {}
}