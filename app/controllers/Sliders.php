<?php 
class Sliders extends Controller {
    public function __construct(){
        $this->sliderModel = $this->model('Slider');
        $this->navModel = $this->model('Nav');
        $this->iconModel = $this->model('Icon');
        $this->logoModel = $this->model('Logo');
    }
    public function edit ($id){
        $navs = $this->navModel->getNavLinks();
        $icons = $this->iconModel->getIcons();
        $logo = $this->logoModel->getLogoById(1);
        $slider = $this->sliderModel->getSliderById($id);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // image name  1
            $image_1 = rand(1000, 10000) . '-' . $_FILES['image_1'] ['name'];
            // image name  2
            $image_2 = rand(1000, 10000) . '-' . $_FILES['image_2'] ['name'];
            // image name  3
            $image_3 = rand(1000, 10000) . '-' . $_FILES['image_3'] ['name'];

            // extension
            $ext_type = array('gif', 'jpg','jpeg','png','svg');
            // file extension image1 
            $file_extension_1 = pathinfo($_FILES["image_1"]["name"], PATHINFO_EXTENSION);
            // file extension image2 
            $file_extension_2 = pathinfo($_FILES["image_2"]["name"], PATHINFO_EXTENSION);
            // file extension image3 
            $file_extension_3 = pathinfo($_FILES["image_3"]["name"], PATHINFO_EXTENSION);
            // #temporary file name to store file 1
            $tname_1 = $_FILES['image_1']['tmp_name'];
            // #temporary file name to store file 2
            $tname_2 = $_FILES['image_2']['tmp_name'];
            // #temporary file name to store file 3
            $tname_3 = $_FILES['image_3']['tmp_name'];
            #upload directory path
            $uploads_dir = 'uploads';
            // #temporary file name to store file 1
            move_uploaded_file($tname_1, $uploads_dir . '/' . $image_1);
            // #temporary file name to store file 2
            move_uploaded_file($tname_2, $uploads_dir . '/' . $image_2);
            // #temporary file name to store file 3
            move_uploaded_file($tname_3, $uploads_dir . '/' . $image_3);

            $data = [
                'id' => $id,
                'image_1' => $image_1,
                'image_2' => $image_2,
                'image_3' => $image_3,
                'navs' => $navs,
                'logo' => $logo,
                'icons' => $icons,

                'image_1_err' => '',
                'image_2_err' => '',
                'image_3_err' => '',
            ];

            // check err  image 1
            if($_FILES['image_1']['name'] == ''){
                $data['image_1'] = $slider->image_1;
              }else{
                // jpg, jpeg
                if (!in_array($file_extension_1, $ext_type)) {
                       $data['image_1_err'] = 'Falsche Dateierweiterung - wählen Sie bitte eine Datei mit folgenden Erweterungen: gif, jpg, jpeg, png, svg';
                   }
                //     if file >  2MB
                if (($_FILES["image_1"]["size"] > 2000000)) {
                 $data['image_1_err'] = 'Bitte Wählen Sie eine Datei mit der Große, die < 2MB ist';
                   } 

              }

              // check err  image 2
            if($_FILES['image_2']['name'] == ''){
                $data['image_2'] = $slider->image_2;
              }else{
                // jpg, jpeg
                if (!in_array($file_extension_2, $ext_type)) {
                       $data['image_2_err'] = 'Falsche Dateierweiterung - wählen Sie bitte eine Datei mit folgenden Erweterungen: gif, jpg, jpeg, png, svg';
        
                   }
                //     if file >  2MB
                if (($_FILES["image_2"]["size"] > 2000000)) {
                 $data['image_2_err'] = 'Bitte Wählen Sie eine Datei mit der Große, die < 2MB ist';
                   } 
              }

              // check err  image 3
            if($_FILES['image_3']['name'] == ''){
                $data['image_3'] = $slider->image_3;
              }else{
                // jpg, jpeg
                if (!in_array($file_extension_3, $ext_type)) {
                       $data['image_3_err'] = 'Falsche Dateierweiterung - wählen Sie bitte eine Datei mit folgenden Erweterungen: gif, jpg, jpeg, png, svg';
                   }
                //     if file >  2MB
                if (($_FILES["image_3"]["size"] > 2000000)) {
                 $data['image_3_err'] = 'Bitte Wählen Sie eine Datei mit der Große, die < 2MB ist';
      
                   } 
    
              }
              // check if no errors
              if(empty($data['image_1_err']) && empty($data['image_2_err']) && empty($data['image_3_err'])){
                if($this->sliderModel->updateSlider($data)){
                    flash('slider_message', 'Slider wurde geändert');
                    redirect('home');
                }else{
                    die('Etwas ist schiefgelaufen');
                }
              }else{
                  // show errors 
               

                  $this->view('sliders/edit', $data);
              }

              

        }else{
            // check for owner
            if($_SESSION['user_is_admin'] != 1){
                redirect('home');
            }

            $data = [
                'id' => $slider->id,
                'slider' =>$slider,
                'navs' => $navs,
                'logo' => $logo,
                'icons' => $icons,
                'image_1' => $slider->image_1,
                'image_2' => $slider->image_2,
                'image_3' => $slider->image_3,
            ];
          
            $this->view('sliders/edit', $data);
        }

        }
        
}