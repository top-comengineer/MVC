<?php

namespace app\config;

class Controller
{

    public string $layout = 'app';
    
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    public function render($view, $vars = [])
    {
        return Application::$app->router->renderContent($view, $vars);
    }
}