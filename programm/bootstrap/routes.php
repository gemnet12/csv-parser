<?php

use Programm\App\Controllers\AppController;
use Programm\App\Controllers\EmployeeController;
use Programm\App\Controllers\DepartmentController;
use Programm\System\Router;

Router::setRoute('index', [
    'url' => '/',
    'action' => 'index',
    'controller' => AppController::class
]);

Router::setRoute('department', [
    'url' => '/department',
    'action' => 'department',
    'controller' => DepartmentController::class
]);

Router::setRoute('load-department', [
    'url' => '/load-department',
    'action' => 'load',
    'controller' => DepartmentController::class
]);

Router::setRoute('employee', [
    'url' => '/employee',
    'action' => 'employee',
    'controller' => EmployeeController::class
]);

Router::setRoute('load-employee', [
    'url' => '/load-employee',
    'action' => 'load',
    'controller' => EmployeeController::class
]);

Router::setRoute('show-employee', [
    'url' => '/show-emloyee',
    'action' => 'show',
    'controller' => EmployeeController::class
]);

Router::setRoute('show-department', [
    'url' => '/show-department',
    'action' => 'show',
    'controller' => DepartmentController::class
]);

Router::setRoute('show-files', [
    'url' => '/show-files',
    'action' => 'show',
    'controller' => AppController::class
]);

