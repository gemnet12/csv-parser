<?php

namespace Programm\App\Controllers;

use Programm\App\Services\Service;

/**
 * Controller
 */
abstract class Controller
{
    protected Service $service;
    
    /**
     * Index
     *
     * @return void
     */
    public function index(): void
    {
        $this->render('index');
    }
    
    /**
     * Show form
     *
     * @return void
     */
    public function loadTable(): void
    {
        $this->render('form', ['name' => $this->service->getTableName()]);
    }
    
    /**
     * load
     *
     * @return void
     */
    public function load(): void
    {
        $file = $_FILES['csv'];
        $this->service->pushData($file);
        $this->redirect('/show-' . $this->service->getTableName());
    }
    
    /**
     * Show
     *
     * @return void
     */
    public function show(): void
    {
        $this->render('show', [
            'columns' => $this->service->getColumns(),
            'rows' => $this->service->getData(),
            'name' => $this->service->getTableName()
        ]);
    }
    
    /**
     * Download
     *
     * @return void
     */
    public function download(): void
    {
        $filePath = $this->service->createTempCsvFile();
        $fileName = basename($filePath);
        
        if (file_exists($fileName)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . $fileName);
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fileName));
            ob_clean();
            flush();
            readfile($fileName);
        }
        
        $this->service->deleteTempCsvFile($filePath);
    }
    
    /**
     * Render view
     *
     * @param string $template
     * @param  array $data
     * @return void
     */
    private function render(string $template, array $data = []): void
    {
        extract($data);
        require __VIEWS_PATH . 'layout/layout.php';
    }
    
    /**
     * redirect
     *
     * @param  string $url
     * @return void
     */
    private function redirect(string $url): void
    {
        header('Location: ' . $url);
    }
}
