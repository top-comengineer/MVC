<?php
  class HomeController extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => SITENAME,
        'description' => 'Welcome to my MVC PHP Framework for Farzad'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'This is the about page.'
      ];

      $this->view('pages/about', $data);
    }
  }