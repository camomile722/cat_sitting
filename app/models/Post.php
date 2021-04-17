<?php 
class Post {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getPosts(){
        $this->db->query('SELECT *, posts.id as postId, users.id as userId, posts.created_at as postCreated, users.created_at as userCreated FROM posts 
        INNER JOIN users 
        ON posts.user_id = users.id
        ORDER BY postCreated DESC
        ');
        //$this->db->bind();

        $results = $this->db->resultSet();
        return $results;
    }

    public function addPost($data){
        $this->db->query('INSERT INTO posts ( title, body, user_id,title_image, image) VALUES(:title, :body, :user_id, :title_image, :image )');
        // bind Values 
        $this->db->bind(':title', $data['title'] );
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title_image', $data['title_image']);
        $this->db->bind(':image', $data['image']);

        //execute
        if($this->db->execute()){
            return true;
        } else{
            return false;
        }
    }

    public function getPostById($id){
        $this->db->query('SELECT * FROM posts WHERE id = :id');

        // Bind values
        $this->db->bind(':id', $id);

        // row for single == $post in posts controller 
        $row = $this->db->single();

        return $row;

    }

     public function postUpdate($data){
         $this->db->query('UPDATE posts SET title = :title, body = :body, title_image = :title_image, image = :image WHERE id = :id ');
         // Bind values
         $this->db->bind(':id', $data['id']);
         $this->db->bind(':title', $data['title']);
         $this->db->bind(':body', $data['body']);
         $this->db->bind(':title_image', $data['title_image']);
         $this->db->bind(':image', $data['image']);
        //execute
         if($this->db->execute()){
             return true;
         }else{
             return false;
         }
     }

     public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');

        // Bind values
        $this->db->bind(':id', $id);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
     }


}