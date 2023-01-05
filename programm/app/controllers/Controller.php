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
            'rows' => $this->service->getData()
        ]);
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