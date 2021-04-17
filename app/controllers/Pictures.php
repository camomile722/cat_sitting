<?php 
class Pictures extends Controller {
    public function __construct(){
        $this->picModel = $this->model('Picture');
        $this->navModel = $this->model('Nav');
        $this->iconModel = $this->model('Icon');
        $this->logoModel = $this->model('Logo');
    }
    public function edit ($id){
        $navs = $this->navModel->getNavLinks();
        $icons = $this->iconModel->getIcons();
        $logo = $this->logoModel->getLogoById(1);
        $picture = $this->picModel->getPicById($id);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // image name  1
            $image = rand(1000, 10000) . '-' . $_FILES['image'] ['name'];
 

            // extension
            $ext_type = array('gif', 'jpg','jpeg','png','svg');
            // file extension image1 
            $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

            // #temporary file name to store file 1
            $tname = $_FILES['image']['tmp_name'];

            #upload directory path
            $uploads_dir = 'uploads';
            // #temporary file name to store file 1
            move_uploaded_file($tname, $uploads_dir . '/' . $image);


            $data = [
                'id' => $id,
                'image' => $image,

                'navs' => $navs,
                'logo' => $logo,
                'icons' => $icons,

                'name_err' => '',
               
            ];

            // check err  image 1
            if($_FILES['image']['name'] == ''){
                $data['image'] = $picture->image;
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

              // check if no errors
              if(empty($data['image_err']) ){
                if($this->picModel->updatePic($data)){
                    flash('picture_message', 'Bild wurde geändert');
                    redirect('home');
                }else{
                    die('Etwas ist schiefgelaufen');
                }
              }else{
                  // show errors 
                  $this->view('pictures/edit', $data);
              }

              

        }else{
            // check for owner
            if($_SESSION['user_is_admin'] != 1){
                redirect('home');
            }

            $data = [
                'id' => $picture->id,
                'picture' =>$picture,
                'navs' => $navs,
                'logo' => $logo,
                'icons' => $icons,
                'image' => $picture->image,
         
            ];
            $this->view('pictures/edit', $data);
        }

        }
        
}