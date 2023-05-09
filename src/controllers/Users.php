<?php
//TODO Should change User controller
    class Users extends Controller {
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function register() {
            // Check for POST method
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Process Form
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = "Please enter email";
                } else {
                    // They did enter something into email field, we want to check it
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validate Name
                if(empty($data['name'])){
                    $data['name_err'] = "Please enter name";
                }

                // Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = "Please enter password";
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = "Password must be at least 6 characters";
                }

                // Validate Confirm Password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = "Please confirm password";
                } else {
                    if ($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = "Passwords do not match";
                    }
                }

                // Make sure errors are empty
                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    // Validated
                    
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Call a model function to register user
                    if($this->userModel->register($data)){
                        // Registered successfully. Redirect to login page.
                        // Created a helper function to redirect someone everytime
                        flash('register_success','Registration successful. Log in to continue.');
                        redirect('users/login');
                    } else {
                        die('Something went wrong in registration process.');
                    }

                } else {
                    // Load view with errors
                    $this->view('auth/register', $data);
                }


            } else {
                // Load form
                // Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load the view
                $this->view('auth/register', $data);

            }

        }

        public function login() {
            // Check for POST method
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process Form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Process Form
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Validate Email
                if(empty($data['email'])){
                    $data['email_err'] = "Please enter email";
                }
                
                // Validate Password
                if(empty($data['password'])){
                    $data['password_err'] = "Please enter password";
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = "Password must be at least 6 characters";
                }

                // Check for user / email
                if($this->userModel->findUserByEmail($data['email'])){
                    // User found
                } else {
                    $data['email_err'] = 'No user with that email found';
                    $data['password_err'] = "";
                }
                
                
                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                    // Validated
                    // die('SUCCESS');
                    // Check and set logged in user
                    // If fine, variable will contain user row, else will return false
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser){
                        // Create session variables
                        // die('SUCCESS. LOGGED IN');

                        $this->createUserSession($loggedInUser);

                    } else {
                        // Rerender form with an error
                        $data['password_err'] = 'Password incorrect.';
                        // Reload view
                        $this->view('auth/login', $data);
                    }
                    
                } else {
                    // Load view with errors
                    $this->view('auth/login', $data);
                }


            } else {
                // Load form
                // Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Load the view
                $this->view('auth/login', $data);
            }

        }


        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;

            // Send user to page, update navbar
            // redirect('pages/index');
            $this->view("auth/profile");
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            
            session_destroy();
            $this->view('auth/logout');
            
        }

        public function profile(){
            
            $this->view("auth/profile");
        }

        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            } else {
                return false;
            }
        }
    }