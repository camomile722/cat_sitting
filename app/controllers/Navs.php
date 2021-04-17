<?php 
class Navs extends Controller {
 public function __construct(){
    $this->navModel= $this->model('Nav');
    $this->iconModel = $this->model('Icon');
    $this->logoModel = $this->model('Logo');
 }
 // blog_mvc_kopie/navs/edit/:id
 public function edit($id){
    $navs = $this->navModel->getNavLinks();
    $icons = $this->iconModel->getIcons();
    $logo = $this->logoModel->getLogoById(1);
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
      
        
        $data = [
            'id' => $id,
            'name' => trim($_POST['name']),
            'link' => trim($_POST['link']),
            'icons' => $icons,
            'navs' => $navs,
            'logo' => $logo,

            'name_err' => '',
            'link_err' => '',


        ];
        //Check if empty 
        if(empty($data['name'])){
            $data['name_err'] = 'Dieses Feld darf nicht leer sein';
        }
        if(empty($data['link'])){
            $data['link_err'] = 'Dieses Feld darf nicht leer sein';
        }

        if(empty($data['link_4'])){
            $data['link_4_err'] = 'Dieses Feld darf nicht leer sein';
        }
      
        // if no errors
        if(empty($data['name_err']) && empty($data['link_err'])){
        
        if($this->navModel->updateNav($data)){
            flash('nav_message', 'Navigation wurde geändert');
            redirect('home');
        }else{
            die('Etwas ist schiefgelaufen');
        }    
            
        }else{
            //show errors
            $this->view('navs/edit', $data);
        }

    }else{
         // check for owner 
         if($_SESSION['user_is_admin'] != 1){
            redirect('home');
          }
        $nav = $this->navModel->getNavbyId($id); 
        $data = [ 
            'navs'=>$navs,     
            'nav' => $nav,
            'logo' => $logo,
            'id' => $nav->id,
            'name' => $nav->name,
            'link' => $nav->link,
            'icons' => $icons,
    
            'name_err' => '',
            'link_err' => '',
    
        ];
        $this-> view('/navs/edit', $data);
    }

 }
 public function add(){
    $navs = $this->navModel->getNavLinks();
    $icons = $this->iconModel->getIcons();
    $logo = $this->logoModel->getLogoById(1);
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
      
        
        $data = [
            'navs' => $navs,
            'icons' => $icons,
            'logo' => $logo,
            'name' => trim($_POST['name']),
            'link' => trim($_POST['link']),
            
            'name_err' => '',
            'link_err' => '',


        ];
        //Check if empty 
        if(empty($data['name'])){
            $data['name_err'] = 'Dieses Feld darf nicht leer sein';
        }
        if(empty($data['link'])){
            $data['link_err'] = 'Dieses Feld darf nicht leer sein';
        }

        if(empty($data['link_4'])){
            $data['link_4_err'] = 'Dieses Feld darf nicht leer sein';
        }
      
        // if no errors
        if(empty($data['name_err']) && empty($data['link_err'])){
        
        if($this->navModel->addNavLink($data)){
            flash('nav_message', 'Navlink wurde hinzugefügt');
            redirect('home');
        }else{
            die('Etwas ist schiefgelaufen');
        }    
            
        }else{
            //show errors
            $this->view('navs/add', $data);
        }

    }else{
         // check for owner 
         if($_SESSION['user_is_admin'] != 1){
            redirect('home');
          }
 
        $data = [ 
            'navs'=>$navs, 
            'icons' => $icons,
            'logo' => $logo,    
            'name' => '',
            'link' => '',
            
            'name_err' => '',
            'link_err' => '',
    
        ];
        $this-> view('/navs/add', $data);
    }

 }
 public function delete($id){
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      // Get existing nav form model
      $nav = $this->navModel-> getNavById($id);
      // check for owner 
      if($_SESSION['user_is_admin'] != 1){
        redirect('home');
      }

      if($this->navModel->deleteNavLink($id)){
        flash('nav_message', 'Navlink wurde gelöscht');
        redirect('home');
      }else{
        die('Etwas ist schiefgelaufen');
      }
      
  
    }else{
      redirect('home');
    }
  }

}