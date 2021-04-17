<?php 
class Cat {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getLastCats(){
        $this->db->query('SELECT * FROM cats  ORDER BY created_at DESC LIMIT 3');
        $results = $this->db->resultSet();
        return $results;
    }
}