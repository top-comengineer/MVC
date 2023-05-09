<?php 

class User {
    private $db;

    public function __construct(){
        // Initialize the DB
        $this->db = new Database;
    }

    // Register User (receives data array including hashed password)
    public function register($data){
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        // Execute statement for INSERT, UPDATE, DELETE
        if($this->db->execute()){
            return true;    // Everything went okay
        } else {
            return false;   // Something went wrong
        }
    }

    // Login User
    public function login($email, $password){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        
        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            // User can be logged in, everything works
            return $row;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email){
        // FLOW: Controller >>> Model >>> Database Library
        // Call the query method in Database object  
        $this->db->query('SELECT * FROM users WHERE email = :email');
        // then use bind method to bind params to stmt,
        $this->db->bind(':email', $email);
        // use SINGLE function to return single row
        $row = $this->db->single();
        print_r($row);
        // Check row to see if email exists already
        if($this->db->rowCount() > 0){
            return true;    // Email exists
        } else {
            return false;   // Email doesn't exist
        }
    }
}