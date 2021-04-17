<?php 
class Story {
    private $db;
    public function __construct (){
        $this->db = new Database;
    }
    public function getStories(){
        $this->db->query('SELECT *, stories.id as storyId, users.id as userId, stories.created_at as storyCreated, users.created_at as userCreated FROM stories
        INNER JOIN users 
        ON stories.user_id = users.id
        ORDER BY storyCreated
        DESC');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getLastStories(){
        $this->db->query('SELECT *, stories.id as storyId, users.id as userId, stories.created_at as storyCreated, users.created_at as userCreated, reviews.id as reviewId, reviews.created_at as reviewCreated FROM stories
        INNER JOIN users 
        ON stories.user_id = users.id
        LEFT JOIN reviews
        ON users.id = reviews.user_id
        ORDER BY storyCreated
        DESC
        LIMIT 4');
        $results = $this->db->resultSet();
        return $results;
    }
    
}