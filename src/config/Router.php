<?php

namespace app\config;

class Router
{
    protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->response = $response;
        $this->request  = $request;
    }
    
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path     = $this->request->getPath();
        $method   = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        
        if (!$callback)
        {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }
        
        if (is_string($callback))
        {
            return $this->renderView($callback);
        }

        if (is_array($callback))
        {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback, $this->request);
        
    }

    public function renderView($view, $vars = [])
    {
        foreach($vars as $key => $value)
        {
            $$key = $value;
        }
        ob_start();
        require_once Application::$dir . "/MVC/src/view/$view.php";
        return ob_get_clean();
    }

    public function renderLayout()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        require_once Application::$dir . "/MVC/src/view/layout/$layout.php";
        return ob_get_clean();
    }

    public function renderContent($view, $vars = [])
    {
        $contentLayout = $this->renderLayout();
        $contentView   = $this->renderView($view, $vars);
        
        return str_replace('{{content}}', (string) $contentView, (string) $contentLayout);
    }
}