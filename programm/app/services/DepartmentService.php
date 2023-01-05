<?php

namespace Programm\App\Services;

use Programm\App\Models\Department;
use Programm\App\Models\Model;

/**
 * Department Service
 */
class DepartmentService extends Service
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        protected Model $model = new Department()
    ) {}
}