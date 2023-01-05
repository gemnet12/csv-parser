<?php

namespace Programm\App\Models;

use Programm\System\Database;

/**
 * Model
 */
abstract class Model
{
    readonly public array $columns;

    readonly protected string $tableName;
    
    /**
     * putData
     *
     * @param  array $rows
     * @param  array $columns
     * @return bool
     */
    public function putData(array $rows, array $columns): bool
    {
        $columnsString = implode(', ', $columns);
        $valuesString = $this->getQueryString($rows);
        return Database::insert($this->tableName, $columnsString, $valuesString);
    }

    public function getAll(): array
    {
        return Database::selectAll($this->tableName);
    }

    /**
     * getQueryString
     *
     * @param  array $rows
     * @param  array $columns
     * @return string
     */
    private function getQueryString(array $rows): string
    {
        $arrOfStrings = array_map(function ($row) {
            $stringifiedRow = array_map(function ($value) {
                return '\'' . trim($value) . '\'';
            }, $row);
            return '(' . implode(', ', $stringifiedRow) . ')';
        }, $rows);

        return implode(', ', $arrOfStrings);
    }
}