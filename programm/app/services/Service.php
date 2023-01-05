<?php

namespace Programm\App\Services;

use Programm\App\Models\FileTable;
use Programm\App\Models\Model;
use Programm\System\Database;

/**
 * Service
 */
abstract class Service
{
    protected Model $model;

    /**
     * Push data to table
     *
     * @param  string $tableName
     * @param  array $file
     * @return bool
     */
    public function pushData(array $file): bool
    {
        $tempName = $file['tmp_name'];
        $fileSize = $file['size'];
        $res = fopen($tempName, 'r+');
        $columns = fgetcsv($res, $fileSize, ";");

        if ($columns === $this->model->columns) {
            $rows = $this->getCsvData($res, $fileSize);
            if ($this->model->putData($rows, $columns)) {
                $this->pushLoadedFile($file['name']);
            }
        }

        return false;
    }
    
    /**
     * getData
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->model->getAll();
    }
    
    /**
     * getColumns
     *
     * @return array
     */
    public function getColumns(): array
    {
        return $this->model->columns;
    }

    /**
     * getColumns
     *
     * @return string
     */
    public function getTableName(): string
    {
        return $this->model->tableName;
    }
    
    /**
     * getCsvData
     *
     * @param  resource $res
     * @param  int $size
     * @return array
     */
    private function getCsvData($res, int $size): array
    {
        $content = [];
        while (($data = fgetcsv($res, $size, ';')) !== false) {
            array_push($content, $data);
        }
        return $content;
    }
    
    /**
     * pushLoadedFile
     *
     * @param  string $fileName
     * @return void
     */
    private function pushLoadedFile(string $fileName): void
    {
        Database::insert('files', 'NAME', '(\'' . $fileName . '\')');
    }
}