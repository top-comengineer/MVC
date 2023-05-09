<?php 

class User {
    private $db;

    public function __construct(){
        // Initialize the DB
        $this->db = new Database;
    }

    // create entity
    public function create($data){
        $this->db->query('INSERT INTO entity (user_id, title, body) VALUES (:user_id, :title, :body)');
        // Bind values
        $this->db->bind(':user_id', $_SESSION["user_id"]);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        // Execute statement for INSERT, UPDATE, DELETE
        if($this->db->execute()){
            return true;    // Everything went okay
        } else {
            return false;   // Something went wrong
        }
    }

    // read entity
    public function read($email){
        $this->db->query('SELECT * FROM entity WHERE email = :email');
        $this->db->bind(':email', $email);
        
        $row = $this->db->resultSet();

    }

    // update entiry
    public function update($email){
      $this->db->query('UPDATE entity SET email = :email');
      $this->db->bind(':email', $email);

      $this->db->excute();
    }

     // delete entiry
     public function delete($email){
      $this->db->query('DELETE from entity WHERE email = :email');
      $this->db->bind(':email', $email);

      $this->db->excute();
    }
}