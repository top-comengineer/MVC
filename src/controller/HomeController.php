<?php

namespace app\controller;

use app\config\Controller;

class HomeController extends Controller
{
    public function index()
    {
        echo "this is home controller";
        $vars = 
        [
            "title" => "Welcome to MVC From Scratch",
            "about" => "This is a simple php mvc from scratch for learning purposes",
        ];
        return $this->render('home', $vars);
    }
}