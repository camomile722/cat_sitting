<?php 
class Button {
    private $db;
    public function __construct(){
        $this->db = new Database();
    }
    public function getButtons(){
        $this->db->query('SELECT * FROM buttons');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getButtonById($id){
        $this->db->query('SELECT * FROM buttons WHERE id = :id');

        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    public function updateButton($data){
        $this->db->query('UPDATE buttons SET name = :name, link = :link WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':link', $data['link']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }
}