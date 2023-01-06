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
     * @param array $columns
     * @param string $tableName
     * @return void
     */
    public function __construct(
        readonly public array $columns = [
            'XML_ID',
            'PARENT_XML_ID',
            'NAME_DEPARTMENT'
        ],
        
        readonly public string $tableName = 'department'
    ) {}
}
