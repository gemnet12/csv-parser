<?php

namespace Programm\System;

/**
 * Router
 */
class Router
{
    private static array $routes;

    /**
     * Navigate
     *
     * @return void
     */
    public function navigate(): void
    {
        $url = $_SERVER['REQUEST_URI'];

        $routes = array_filter(self::$routes, static function ($route) use ($url) {
            return $route['url'] === $url;
        });

        if (empty($routes)) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 404 Page doesn\'t exists');
            exit;
        }

        $route = array_pop($routes);
        $controller = new $route['controller']();
        $action = $route['action'];
        $controller->$action();
    }
    
    /**
     * Set route
     *
     * @param  string $name
     * @param  array<array<string>> $params
     * @return void
     */
    public static function setRoute(string $name, array $params): void
    {
        self::$routes[$name] = $params;
    }
}
