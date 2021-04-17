<?php 
class Catsitters extends Controller {
    public function __construct(){
        $this->navModel = $this->model('Nav');
        $this->logoModel = $this->model('Logo');
        $this->iconModel = $this->model('Icon');
        $this->catsitterModel = $this->model('Catsitter');
    }
    
    public function index(){
        $navs = $this->navModel->getNavLinks();
        $logo = $this->logoModel->getLogoById(1);
        $icons = $this->iconModel->getIcons();
        $catsitters = $this->catsitterModel->getCatsitters();

        $data = [
            'navs' => $navs,
            'logo' => $logo,
            'icons' => $icons,
            'catsitters' => $catsitters,
        ];
        $this->view('/catsitters/index', $data);
    }

    public function search(){
        $navs = $this->navModel->getNavLinks();
        $logo = $this->logoModel->getLogoById(1);
        $icons = $this->iconModel->getIcons();
        $catsitters = $this->catsitterModel->getCatsitters();
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $catsitters = $this->catsitterModel->getCatsittersByDistrict($_POST['district']);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'navs' => $navs,
                'logo' => $logo,
                'icons' => $icons,
                'district' => trim($_POST['district']),
                'catsitters' => $catsitters,
            ]; 
            
            $this->view('catsitters/search', $data);
        }else{
            $data = [
                'navs' => $navs,
                'logo' => $logo,
                'icons' => $icons,
                'catsitters' => $catsitters,
                'district' => '',
            ];

            $this->view('catsitters/search', $data);

        }
           
    }
        

        
    
}