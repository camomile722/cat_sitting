<?php 

class Comment {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
   // posts/show/id == $id , show all coments from post_id
    public function getCommentsByPostId($id){
        // Query
        $this->db->query('SELECT *, comments.id as commentId, users.id as userId, comments.created_at as commentCreated, users.created_at as userCreated FROM comments 

        INNER JOIN users ON comments.user_id =  users.id
        AND post_id = :id
        ORDER BY comments.created_at DESC');
        // Bind Values
        $this->db->bind(':id', $id);
        // Fetch 
        $results = $this->db->resultSet();
        return $results;
    }

    public function addComment($data){
        // Query
        $this->db->query('INSERT INTO comments (body_comment, user_id, post_id) VALUES (:body_comment, :user_id, :post_id )');

        // bind values
        $this->db->bind(':body_comment', $data['body_comment']);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('post_id', $data['post_id']);

        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getCommentById($id){
        $this->db->query('SELECT * FROM comments WHERE id = :id');
        // bind values 
        $this->db->bind(':id', $id);

        // single row 
        $row = $this-> db-> single();
        return $row;
    }
    public function updateComment($data){
        $this->db->query('UPDATE comments SET body_comment = :body_comment, user_id = :user_id  WHERE id = :id');
        
        // bind values 
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':body_comment', $data['body_comment']);
        $this->db->bind(':user_id', $data['user_id']);
    

         //Execute 
         if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteComment($id){
        // Query
        $this->db->query('DELETE FROM comments WHERE id = :id');
        // bind values 
        $this->db->bind(':id', $id );
        // Execute 
        if($this->db->execute()){
            return true;          
        }else{
            return false;
        }

    }
}
?>