<?php 
class Review {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getReviews(){
        $this->db->query('SELECT *, reviews.id as reviewId, users.id as userId, reviews.created_at as reviewCreated, users.created_at as userCreated FROM reviews
        INNER JOIN users
        ON reviews.user_id = users.id
        ORDER BY reviewCreated
        DESC LIMIT 1');

        $results = $this->db->resultSet();
        return $results;
    }
}