<?php 
class Nav {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getNavLinks(){
        $this->db->query('SELECT * FROM navs');
        //$this->db->bind();

        $results = $this->db->resultSet();
        return $results;
    }

    public function getNavById($id){
        $this->db->query('SELECT * FROM navs WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    public function updateNav($data){
        $this->db->query('UPDATE navs SET name = :name, link = :link WHERE id = :id');
        // bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':link', $data['link']);
     

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function addNavLink($data){
        $this->db->query('INSERT INTO navs ( name, link ) VALUES(:name, :link)');
        // bind Values 
        $this->db->bind(':name', $data['name'] );
        $this->db->bind(':link', $data['link']);
        //execute
        if($this->db->execute()){
            return true;
        } else{
            return false;
        }
    }
    public function deleteNavLink($id){
        $this->db->query('DELETE FROM navs WHERE id = :id');

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