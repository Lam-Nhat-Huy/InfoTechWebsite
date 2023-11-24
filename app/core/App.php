<?php
class App
{
    protected $controller = 'DashboardController';
    protected $method = 'index';
    protected $params = [];

    function __construct()
    {
        $arr = $this->UrlProcess();

        if (isset($arr[0])) {
            $controllerName = ucfirst(strtolower($arr[0])) . 'Controller';
            if (file_exists('./app/controllers/' . $controllerName . '.php')) {
                $this->controller = $controllerName;
                unset($arr[0]);
            }
        }

        require_once './app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->method = $arr[1];
                unset($arr[1]);
            }
        }

        $this->params = $arr ? array_values($arr) : [];


        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    function UrlProcess()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(trim($_GET['url'], '/')));
        }
    }
}
