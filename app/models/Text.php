<?php 
class Text {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getTexts(){
        $this->db->query('SELECT * FROM texts');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getTextById($id){
        $this->db->query('SELECT * FROM texts WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    public function updateText($data){
        $this->db->query('UPDATE texts SET title = :title, text = :text, button_name = :button_name, button_link = :button_link WHERE id = :id');

        // bind Values 
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':button_name', $data['button_name']);
        $this->db->bind(':button_link', $data['button_link']);

        if($this->db->execute()){
            return true;          
        }else{
            return false;
        }
    }
}
