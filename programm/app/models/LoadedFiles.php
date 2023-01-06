<?php

namespace Programm\App\Models;

use Programm\App\Models\Model;

/**
 * LoadedFiles
 */
class LoadedFiles extends Model
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
            'NAME',
            'DATE'
        ],
        
        readonly public string $tableName = 'files'
    ) {}
}
