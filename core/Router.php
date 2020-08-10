<?php

class Router {
    public $routes = [];

    public function define($uri, $controller)
    {
        $this->routes[$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes)){
            $arr = explode('@' ,$this->routes[$uri]);
            $controller = $arr[0];
            $method = $arr[1];
            try {
                return $this->method($controller, $method, $requestType);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function method($controller, $method, $requestType)
    {
        if (! class_exists($controller)) {
            throw new Exception("{$controller} class doesn't exist");
        }

        $controller = new $controller;

        if (! method_exists($controller, $method))
            throw new Exception("{$method} doesn't exist in " . get_class($controller));

        return $controller->$method(Request::data($requestType));
    }
}