<?php 
class Catsitter{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getCatsitters(){
        $this->db->query('SELECT *, users.id as userId, reviews.id as reviewId FROM users 
        LEFT JOIN reviews
        ON users.id = reviews.user_id
        WHERE users.is_catsitter = 1');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getCatsittersByDistrict($district){
        $this->db->query('SELECT *, users.id as userId, reviews.id as reviewId FROM users 
        LEFT JOIN reviews
        ON users.id = reviews.user_id
        WHERE users.is_catsitter = 1
        AND district = :district');
        // bind district
        $this->db->bind(':district', $district);
        $results = $this->db->resultSet();
        return $results;
    }
}