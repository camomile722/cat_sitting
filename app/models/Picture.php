<?php 
class Picture{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getPicById($id){
        $this->db->query('SELECT * FROM pictures WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    public function updatePic($data){
        $this->db->query('UPDATE pictures SET image = :image WHERE id = :id');
        // bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':image', $data['image']);
 
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}