<?php 
class Texts extends Controller {
    public function __construct(){
        $this->textModel = $this->model('Text');
        $this->navModel = $this->model('Nav');
        $this->iconModel = $this->model('Icon');
        $this->logoModel = $this->model('Logo');
    }

    public function edit($id){
        $navs = $this->navModel->getNavLinks();
        $icons = $this->iconModel->getIcons();
        $text = $this->textModel->getTextById($id);
        $logo = $this->logoModel->getLogoById(1);
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'navs'=> $navs,
                'logo' => $logo,
                'icons' => $icons,
                'title' => trim($_POST['title']),
                'text' => trim($_POST['text']),
                'button_name'=> trim($_POST['button_name']),
                'button_link'=> trim($_POST['button_link']),
                'title_err' => '',
                'text_err' => '',
                'button_name_err' => '',
                'button_link_err' => '',
            ];

            // check errors
            if(empty($data['title'])){
                $data['title_err'] = 'Bitte geben Sie Titel ein';
            }
            if(empty($data['text'])){
                $data['text_err'] = 'Bitte geben Sie den Text ein';
            }
            if(empty($data['button_name'])){
                $data['button_name_err'] = 'Bitte geben Sie den Namen für Button ein';
            }
            if(empty($data['button_link'])){
                $data['button_link_err'] = 'Bitte geben Sie den Link für Button ein';
            }
            // if no errors
            if(empty($data['title_err']) && empty($data['text_err']) && empty($data['button_name_err']) && empty($data['button_link_err'])){
                if($this->textModel->updateText($data)){
                    flash('text_message', 'Text wurde geändert');
                     redirect('home');
                }else{
                    die('Etwas ist schiefgelaufen');
                }              
            }else{
                // show errors
                $this->view('texts/edit', $data);
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
                'title' => $text->title,
                'text' => $text->text,
                'button_name' => $text->button_name,
                'button_link' => $text->button_link,
    
            ];
            $this->view('texts/edit', $data);
        }
        
    }
}