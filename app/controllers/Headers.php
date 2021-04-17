<?php 
class Headers extends Controller {
    public function __construct(){
        $this->headerModel = $this->model('Header');
        $this->navModel = $this->model('Nav');
        $this->iconModel = $this->model('Icon');
        $this->logoModel = $this->model('Logo');
    }

    public function edit($id){
        $navs = $this->navModel->getNavLinks();
        $icons = $this->iconModel->getIcons();
        $logo = $this->logoModel->getLogoById(1);
        $header = $this->headerModel->getHeaderById(1);
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'navs'=> $navs,
                'logo' => $logo,
                'icons' => $icons,
                'title' => trim($_POST['title']),

                'title_err' => '',

            ];

            // check errors
            if(empty($data['title'])){
                $data['title_err'] = 'Bitte geben Sie Titel ein';
            }

            // if no errors
            if(empty($data['title_err'])){
                if($this->headerModel->updateHeader($data)){
                    flash('header_message', 'Header wurde geändert');
                     redirect('home');
                }else{
                    die('Etwas ist schiefgelaufen');
                }              
            }else{
                // show errors
                $this->view('headers/edit', $data);
            }
        }else{
            // check for owner 
            if($_SESSION['user_is_admin'] != 1){
                redirect('home');
            }
            $data = [
                'id' => $id,
                'navs'=> $navs,
                'logo' => $logo,
                'icons' => $icons,
                'title' => $header->title,
    
            ];
            $this->view('headers/edit', $data);
        }
        
    }
}