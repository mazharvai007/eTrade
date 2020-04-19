<?php


namespace App;

use AltoRouter;

class RouteDispatcher
{
    protected $match; // Match from previous route file
    protected $controller; // For controller class
    protected $method; // For controller method

    /*
     * If a class is instantiate then the function will call immediately
     * Pass AltoRouter for routing
     */
    public function __construct(AltoRouter $router)
    {
        $this->match = $router->match();

        if ($this->match) {
            list($controller, $method) = explode('@', $this->match['target']);
            $this->controller = $controller;
            $this->method = $method;

            // Check valid controller and method
            if (is_callable(array(new $this->controller, $this->method))) {
                call_user_func_array(array(new $this->controller, $this->method), array($this->match['params']));
            } else {
                echo "The method {$this->method} is not defined in {$this->controller}";
            }

        } else {
            header($_SERVER['SERVER_PROTOCOL'] . '404 Not Found');
            echo "Page not found";
        }
    }
}