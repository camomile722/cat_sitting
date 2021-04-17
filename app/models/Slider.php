<?php 
class Slider {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function getSliderById($id){
        $this->db->query('SELECT * FROM sliders WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    public function updateSlider($data){
        $this->db->query('UPDATE sliders SET image_1 = :image_1, image_2 = :image_2, image_3 = :image_3 WHERE id = :id');
        // bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':image_1', $data['image_1']);
        $this->db->bind(':image_2', $data['image_2']);
        $this->db->bind(':image_3', $data['image_3']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

}