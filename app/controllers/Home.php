<?php 
class Home extends Controller {
    public function __construct(){
        $this->navModel = $this->model('Nav');
        $this->logoModel = $this->model('Logo');
        $this->sliderModel = $this->model('Slider');
        $this->textModel = $this->model('Text');
        $this->textSecModel = $this->model('TextSec');
        $this->headerModel = $this->model('Header');
        $this->picModel = $this->model('Picture');
        $this->buttonModel = $this->model('Button');
        $this->catModel = $this->model('Cat');
        $this->storyModel = $this->model('Story');
        $this->iconModel = $this->model('Icon');
        $this->reviewModel = $this->model('Review');
        $this->catsitterModel = $this->model('Catsitter');
        
    }

    public function index(){
        $navs = $this->navModel->getNavLinks();
        $logo = $this->logoModel->getLogoById(1);
        $slider = $this->sliderModel->getSliderById(1);
        $texts = $this->textModel->getTexts();
        $textsec = $this->textSecModel->getTextById(1);
        $header = $this->headerModel->getHeaderById(1);
        $picture = $this->picModel->getPicById(1);
        $picture2 = $this->picModel->getPicById(2);
        $cats = $this->catModel->getLastCats();
        $stories = $this->storyModel->getLastStories();
        $icons = $this->iconModel->getIcons();
        $reviews = $this->reviewModel->getReviews();
        $catsitters = $this->catsitterModel->getCatsitters();

        $data = [
            'navs' => $navs,
            'logo' => $logo,
            'slider' => $slider,
            'texts' => $texts,
            'textsec' => $textsec,
            'header' => $header,
            'picture' => $picture,
            'picture2' => $picture2,
            'cats' => $cats,
            'stories' => $stories,
            'icons' => $icons,
            'reviews' => $reviews,
            'catsitters'=> $catsitters,
        ];
        $this->view('home/index', $data);
    }
}