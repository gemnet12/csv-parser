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
     * Show form department
     *
     * @return void
     */
    public function department(): void
    {
        $this->render('department', ['name' => 'department']);
    }
    
    /**
     * emplyee
     *
     * @return void
     */
    public function employee(): void
    {
        $this->render('employee', ['name' => 'employee']);
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
        $this->redirect('/');
    }
    
    /**
     * List
     *
     * @return void
     */
    public function list(): void
    {

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