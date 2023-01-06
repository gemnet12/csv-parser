<?php

namespace Programm\App\Services;

use Exception;
use Programm\App\Models\FileTable;
use Programm\App\Models\Model;
use Programm\System\Database;

/**
 * Service
 */
abstract class Service
{
    protected Model $model;

    const SEPARATOR = ';';

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
        $columns = fgetcsv($res, $fileSize, self::SEPARATOR);

        if ($columns === $this->model->columns) {
            $rows = $this->getCsvData($res, $fileSize);
            if ($this->model->putData($rows, $columns)) {
                return $this->pushLoadedFile($file['name']);
            }
        }

        return false;
    }
    
    /**
     * createCsvFile
     *
     * @return string
     */
    public function createTempCsvFile(): string
    {
        $data = $this->model->getAll();
        $columns = $this->model->columns;
        $filePath = __BASE_PATH . 'public/' . time() . $this->getTableName() . '.csv';
        $file = fopen($filePath, 'wb');
        fputcsv($file, $columns, self::SEPARATOR);
        foreach ($data as $row) {
            fputcsv($file, $row, self::SEPARATOR);
        }
        fclose($file);
        return $filePath;
    }

    /**
     * Delete Csv File
     *
     * @return void
     */
    public function deleteTempCsvFile(string $filePath): void
    {
        unlink($filePath);
    }
    
    /**
     * Get Data
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
     * @return bool
     */
    private function pushLoadedFile(string $fileName): bool
    {
        return Database::insert('files', 'NAME', '(\'' . $fileName . '\')');
    }
}