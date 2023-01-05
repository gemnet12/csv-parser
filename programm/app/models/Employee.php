<?php

namespace Programm\App\Models;

/**
 * Employee
 */
class Employee extends Model
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        readonly public array $columns = [
            'XML_ID',
            'LAST_NAME',
            'NAME',
            'SECOND_NAME',
            'DEPARTMENT',
            'WORK_POSITION',
            'EMAIL',
            'MOBILE_PHONE',
            'PHONE',
            'LOGIN',
            'PASSWORD'
        ],
        
        readonly protected string $tableName = 'employee'
    ) {}
}