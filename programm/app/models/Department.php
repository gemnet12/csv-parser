<?php

namespace Programm\App\Models;

/**
 * Department
 */
class Department extends Model
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        readonly public array $columns = [
            'XML_ID',
            'PARENT_XML_ID',
            'NAME_DEPARTMENT'
        ],
        
        readonly protected string $tableName = 'department'
    ) {}
}