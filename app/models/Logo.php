<?php 
class Logo {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getLogoById($id){
        $this->db->query('SELECT * FROM logo WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    public function updateLogo($data){
        $this->db->query('UPDATE logo SET image = :image WHERE id = :id ');
         // Bind values
         $this->db->bind(':id', $data['id']);
         $this->db->bind(':image', $data['image']);
        //execute
         if($this->db->execute()){
             return true;
         }else{
             return false;
         }
        }
}
