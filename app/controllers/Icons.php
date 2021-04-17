<?php 
class Icons extends Controller{
    public function __construct(){
        $this->iconModel = $this->model('Icon');
        $this->navModel = $this->model('Nav');
        $this->logoModel = $this->model('Logo');
    }
    public function edit($id){
        $navs = $this->navModel->getNavLinks();
        $icons = $this->iconModel->getIcons();
        $icon = $this->iconModel->getIconById($id);
        $logo = $this->logoModel->getLogoById(1);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
             // image name 
        $image = rand(1000, 10000) . '-' .$_FILES['image']['name'];
        // extension
        $ext_type = array('gif','jpg','jpeg','png','svg');
 
        // file extension
        $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
 
          // #temporary file name to store file
         $tname = $_FILES['image']['tmp_name'] ;
 
         #upload directory path
         $uploads_dir = 'uploads';
 
         // #TO move the uploaded file to specific location
         move_uploaded_file($tname, $uploads_dir. '/' .$image);
 
            $data = [
                'id' => $id,
                'navs' => $navs,
                'icons' => $icons,
                'logo' => $logo,
                'name' => trim($_POST['name']),
                'link' => trim($_POST['link']),
                'image' => trim($image),
                'name_err' => '',
                'link_err' => '',
                'image_err' => '',
            ];
            // check errors
            if(empty($data['name'])){
                $data['name_err'] = 'Bitte geben Sie den Namen ein';
            }
            if(empty($data['link'])){
                $data['link_err'] = 'Bitte geben Sie den Link ein';
            }
            if($_FILES['image']['name'] == ''){
                $data['image'] = $icon->image;
              }else{
                // jpg, jpeg
                if (!in_array($file_extension, $ext_type)) {
                       $data['image_err'] = 'Falsche Dateierweiterung - wählen Sie bitte eine Datei mit folgenden Erweterungen: gif, jpg, jpeg, png, svg';
                   }
                //     if file >  2MB
                if (($_FILES["image"]["size"] > 2000000)) {
                 $data['image_err'] = 'Bitte Wählen Sie eine Datei mit der Große, die < 2MB ist';
                   } 
              }
          // if no errors
          if(empty($data['name_err']) && empty($data['link_err']) && empty($data['image_err'])){
              if($this->iconModel->updateIcon($data)){
                flash('icon_message', 'Icon wurde geändert');
                redirect('home');
              }else{
                  die('Etwas ist schiefgelaufen');
              }
              
          }else{
              // show errors
              $this->view('icons/edit', $data);
          }

        }else{

       // check for owner
       if($_SESSION['user_is_admin'] != 1){
        redirect('home');
    }
            $data = [
                'id' => $id,
                'navs' => $navs,
                'logo' => $logo,
                'icons' => $icons,
                'name' => $icon->name,
                'link' => $icon->link,
                'image' => $icon->image,
            ];
            $this->view('icons/edit', $data);
        }
        
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Get existing icon  model
        $icon = $this->iconModel-> getIconById($id);
        // check for owner
        if($_SESSION['user_is_admin'] != 1){
            redirect('home');
        }

        if($this->iconModel->deleteIcon($id)){
          flash('icon_message', 'Icon wurde gelöscht');
          redirect('home');
        }else{
          die('Etwas ist schiefgelaufen');
        }
        
    
      }else{
        redirect('home');
      }
        
    }

    public function add(){
        $navs = $this->navModel->getNavLinks();
        $icons = $this->iconModel->getIcons();
        $logo = $this->logoModel->getLogoById(1);
  
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Sanitize POSt 
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
          // image name 
          $image = rand(1000, 10000) . '-' .$_FILES['image']['name'];
         // extension
         $ext_type = array('gif','jpg','jpeg','png','svg');
  
         // file extension
         $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
  
           // #temporary file name to store file
          $tname = $_FILES['image']['tmp_name'] ;
  
          #upload directory path
          $uploads_dir = 'uploads';
  
          // #TO move the uploaded file to specific location
          move_uploaded_file($tname, $uploads_dir. '/' .$image);
  
          $data = [
            'name' => trim($_POST['name']),
            'link' => trim($_POST['link']),
            'image' => trim($image),
            'navs' => $navs,
            'icons' => $icons,
            'logo' => $logo,
            
            'name_err' => '',
            'link_err' => '',
            'image_err' => '',
            
          ];
  
          // check if empty 
          if(empty($data['name'])){
            $data['name_err'] = 'Bitte geben Sie den Namen ein';
          }
          if(empty($data['link'])){
            $data['link_err'] = 'Bitte geben Sie den Link ein';
          }
         
          if($_FILES['image']['name'] == ''){
            $data['image_err'] = 'Dieses field kann nicht leer sein';
          }
  
          if (!in_array($file_extension, $ext_type)) {
            $data['image_err'] = 'Falsche Dateierweiterung - wählen Sie bitte eine Datei mit folgenden Erweterungen: gif, jpg, jpeg, png, svg';
        }
        // if file >  2MB
        if (($_FILES["image"]["size"] > 2000000)) {
          $data['image_err'] = 'Bitte Wählen Sie eine Datei mit der Große, die < 2MB ist';
      }    
          // check if no errors
          if(empty($data['name_err']) && empty($data['link_err']) && empty($data['image_err'])){
            // Validated 
            if($this->iconModel->addIcon($data)){
              flash('icon_message', 'Icon wurde hinzugefügt');
              redirect('home');
            }else{
              die('Etwas ist schief gelaufen');
            }
          }else{
            // show errors
            $this->view('icons/add', $data);
          }
  
        }else{
  
        // check for owner 
        if(!isset($_SESSION['user_id']))  {
          redirect('home');
        }
            // init data
        $data = [
          'name' => '',
          'link' => '',
          'image' => '',
          'navs' => $navs,
          'icons' => $icons,
          'logo' => $logo,
        ];
        $this->view('icons/add', $data);
      }
        }
}