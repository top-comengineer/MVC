<?php
//TODO implementation EntityController
  class EntityController extends Controller {
    public function __construct() {
      $this->entityModel = $this->model("Entity");
    }

    public function index() {
      //check for POST method 
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Sanitize POST data
        $POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Process Form
        $data = [
          'user_id'    =>  trim($_POST['user_id']),
          'title'      =>  trim($_POST['title']),
          'body'       =>  trim($_POST['body'])
        ];
      } else {
        // load data from form
        // init data
        $data = [
          'user_id'    => '',
          'title'      => '',
          'body'       => ''
        ];

        //load the view
        $this->view('auth/profile', $data);
      }
    }
  }