<?php

namespace Programm\System;

/**
 * App
 */
class App
{
    private Router $router; 
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->router = new Router();
    }

    /**
     * run
     *
     * @return void
     */
    public function run(): void
    {
        $this->router->navigate();
    }
}