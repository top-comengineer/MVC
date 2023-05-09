<?php

namespace app\config;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    
    public static string $dir;
    public static Application $app;
    
    
    public function __construct($dir)
    {
        $this->response   = new Response;
        $this->request    = new Request;
        $this->controller = new Controller;
        
        self::$dir        = $dir;
        self::$app        = $this;
        
        $this->router     = new Router($this->request, $this->response);
    }

    public function run()
    {
        print $this->router->resolve();
    }
}