<?php 
class TextSec {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    public function getTexts(){
        $this->db->query('SELECT * FROM texts_sec');
        $results = $this->db->resultSet();
        return $results;
    }
    public function getTextById($id){
        $this->db->query('SELECT * FROM texts_sec WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    public function updateText($data){
        $this->db->query('UPDATE texts_sec SET title = :title, text = :text, link = :link WHERE id = :id');

        // bind Values 
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':text', $data['text']);
        $this->db->bind(':link', $data['link']);


        if($this->db->execute()){
            return true;          
        }else{
            return false;
        }
    }
}
