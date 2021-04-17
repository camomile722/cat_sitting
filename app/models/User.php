<?php 
class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        // Check row

        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    // Register 
    public function register($data){
        $this->db->query(' INSERT INTO users (name, email, password, is_admin, district, is_catsitter) VALUES (:name, :email, :password, :is_admin, :district, :is_catsitter)');
        $this->db->bind(':name', $data['name'] );
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':is_admin', $data['is_admin']);
        $this->db->bind(':district', $data['district']);
        $this->db->bind(':is_catsitter', $data['is_catsitter']);

        if($this->db->execute()){
            return true;
        }else {
            return false;
        }
    }

     // Login
     public function login ($email, $password){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email );
        $row = $this->db->single();
        $hashed_password = $row->password;
        // if password = hashed_password return user
        if(password_verify($password, $hashed_password)){
            return $row;
        }else{
            return false;
        }

    }

    public function getUserById($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');

        $this->db->bind(':id' , $id);

        $row = $this->db->single();
        return $row;
    }

}