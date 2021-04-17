<?php 
class Header{
    private $db;
    public function __construct (){
        $this->db = new Database;
    }

    public function getHeaderById($id){
        $this->db->query('SELECT * FROM headers WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updateHeader($data){
        $this->db->query('UPDATE headers SET title = :title WHERE id = :id');

        // bind Values 
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);

        if($this->db->execute()){
            return true;          
        }else{
            return false;
        }
    }
} 
