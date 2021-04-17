<?php 
class TextsSec extends Controller {
    public function __construct(){
        $this->textSecModel = $this->model('TextSec');
        $this->navModel = $this->model('Nav');
        $this->iconModel = $this->model('Icon');
        $this->logoModel = $this->model('Logo');
    }

    public function edit($id){
        $navs = $this->navModel->getNavLinks();
        $icons = $this->iconModel->getIcons();
        $textsec = $this->textSecModel->getTextById(1);
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
                'link' => trim($_POST['link']),

                'title_err' => '',
                'text_err' => '',
                'link_err' => '',

            ];

            // check errors
            if(empty($data['title'])){
                $data['title_err'] = 'Bitte geben Sie Titel ein';
            }
            if(empty($data['text'])){
                $data['text_err'] = 'Bitte geben Sie den Text ein';
            }

            if(empty($data['link'])){
                $data['link_err'] = 'Bitte geben Sie den Link ein';
            }
            // if no errors
            if(empty($data['title_err']) && empty($data['text_err']) && empty($data['link_err'])){
                if($this->textSecModel->updateText($data)){
                    flash('text_message', 'Text wurde geändert');
                     redirect('home');
                }else{
                    die('Etwas ist schiefgelaufen');
                }              
            }else{
                // show errors
                $this->view('textssec/edit', $data);
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
                'title' => $textsec->title,
                'text' => $textsec->text,
                'link' => $textsec->link,
    
            ];
            $this->view('textssec/edit', $data);
        }
        
    }
}