<?php 
class Icon {
    private $db;
    public function __construct (){
        $this->db = new Database;
    }
    public function getIcons(){
        $this->db->query('SELECT * FROM icons');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getIconById($id){
        $this->db->query('SELECT * FROM icons WHERE id = :id');
        // bind values
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    public function updateIcon($data){
        $this->db->query('UPDATE icons SET name = :name, link = :link, image = :image WHERE id = :id');
        // bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':link', $data['link']);
        $this->db->bind(':image', $data['image']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteIcon($id){
        $this->db->query('DELETE FROM icons WHERE id = :id');
        // bind values
        $this->db->bind(':id', $id);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function addIcon($data){
        $this->db->query('INSERT INTO icons ( name, link, image) VALUES(:name, :link, :image )');
        // bind Values 
        $this->db->bind(':name', $data['name'] );
        $this->db->bind(':link', $data['link']);
        $this->db->bind(':image', $data['image']);

        //execute
        if($this->db->execute()){
            return true;
        } else{
            return false;
        }
    }
}