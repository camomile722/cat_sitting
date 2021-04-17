<?php
  class Posts extends Controller {
    public function __construct(){
      $this->postModel = $this->model('Post');
      $this->userModel = $this->model('User');
      $this->commentModel = $this->model('Comment');
      $this->navModel= $this->model('Nav');
      $this->sliderModel= $this->model('Slider');
      $this->textModel= $this->model('Text');
      $this->iconModel = $this->model('Icon');
      $this->logoModel = $this->model('Logo');
      
    }

    public function index(){
      $posts = $this->postModel-> getPosts();
      $icons = $this->iconModel->getIcons();
      $navs = $this->navModel->getNavLinks();
      $slider = $this->sliderModel->getSliderById(1);
      $text = $this->textModel->getTextById(1);
      $logo = $this->logoModel->getLogoById(1);
      
    
      $data = [
        'posts' => $posts,
        'navs' => $navs,
        'icons' => $icons,
        'slider' => $slider,
        'text' => $text,
        'logo' => $logo,     

      ];
      $this->view('posts/index', $data) ;
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
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'user_id' => $_SESSION['user_id'],
          'title_image' => trim($_POST['title_image']),
          'image' => trim($image),
          'navs' => $navs,
          'icons' => $icons,
          'logo' => $logo,
          
          'title_err' => '',
          'body_err' => '',
          'title_image_err' => '',
          'image_err' => '',
          
        ];

        // check if empty 
        if(empty($data['title'])){
          $data['title_err'] = 'Bitte geben Sie den Titel ein';
        }
        if(empty($data['body'])){
          $data['body_err'] = 'Bitte geben Sie den Text ein';
        }
        if(empty($data['title_image'])){
          $data['title_image_err'] = 'Bitte geben Sie den Foto-Titel ein';
        }
        if($_FILES['image']['name'] == ''){
          $data['image_err'] = 'Dieses field kann nicht leer sein';
        }
        if(strlen($image) > 200) {  $data['image_err'] = 'Bild Name ist zu lang'; }

        if (!in_array($file_extension, $ext_type)) {
          $data['image_err'] = 'Falsche Dateierweiterung - wählen Sie bitte eine Datei mit folgenden Erweterungen: gif, jpg, jpeg, png, svg';
      }
      // if file >  2MB
      if (($_FILES["image"]["size"] > 2000000)) {
        $data['image_err'] = 'Bitte Wählen Sie eine Datei mit der Große, die < 2MB ist';
    }    
        // check if no errors
        if(empty($data['title_err']) && empty($data['body_err']) && empty($data['title_image_err']) && empty($data['image_err'])){
          // Validated 
          if($this->postModel->addPost($data)){
            flash('post_message', 'Post wurde hinzugefügt');
            redirect('posts');
          }else{
            die('Etwas ist schief gelaufen');
          }
        }else{
          // show errors
          $this->view('posts/add', $data);
        }

      }else{

      // check for owner 
       if(isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin'] != 1){
          redirect('posts');
        }
          // init data
      $data = [
        'title' => '',
        'body' => '',
        'title_image' => '',
        'image' => '',
        'navs' => $navs,
        'icons' => $icons,
        'logo' => $logo,
      ];
      $this->view('posts/add', $data);
    }
      }
    
      // posts/show/id  $id from url
    public function show($id){
      $post = $this->postModel->getPostById($id);
      $user = $this->userModel->getUserById($post->user_id);
      $comments = $this->commentModel->getCommentsByPostId($id);
      $navs = $this->navModel->getNavLinks();
      $icons = $this->iconModel->getIcons();
      $logo = $this->logoModel->getLogoById(1);
    

      $data = [
        'post' => $post,
        'user' => $user,
        'comments' => $comments,
        'navs' => $navs,
        'icons' => $icons,
        'logo' => $logo,
      ];

      $this->view('posts/show', $data);

    }  

    public function edit($id){
      $navs = $this->navModel->getNavLinks();
      $icons = $this->iconModel->getIcons();
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
        $post = $this->postModel->getPostById($id);
        
        $data = [
          'id' => $id,
          'title' => trim($_POST['title']),
          'body' => trim($_POST['body']),
          'image' => trim($image),
          'title_image' => trim($_POST['title_image']),
          'navs' => $navs,
          'post'=>$post,
          'icons' => $icons,
          'logo' => $logo,

          'title_err' => '',
          'body_err' => '',
          'image_err' => '',
          'title_image_err' =>''


        ];
        // Check if empty inputs 
        if(empty($data['title'])){
          $data['title_err'] = 'Bitte geben Sie den Titel ein';
        }
        if(empty($data['body'])){
          $data['body_err'] = 'Bitte geben Sie den Text ein';
        }
        if(empty($data['title_image'])){
          $data['title_image_err'] = 'Bitte geben Sie den Foto-Titel ein';
        }

        if($_FILES['image']['name'] == ''){
          $data['image'] = $post->image;
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
        if(empty($data['title_err']) && empty($data['body_err']) && empty($data['title_image_err']) && empty($data['image_err'])){

          if($this->postModel->postUpdate($data)){
            flash('post_message', 'Beitrag wurde geändert');
            redirect('posts/show/'. $data['id']);
          }else{
            die('Etwas ist schiefgelaufen');
          }
           
        }else{
          
          // show errors
          $this->view('posts/edit', $data);
        }
        

      }else{
        // Get existing post form model
        $post = $this->postModel-> getPostById($id);
        // check for owner 
        if(isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin'] != 1){
          redirect('posts');
        }
        $navs = $this->navModel->getNavLinks();
        $icons = $this->iconModel->getIcons();
        $logo = $this->logoModel->getLogoById(1);

        $data = [
            'id' => $id,
            'title' => $post->title,
            'body' => $post->body,
            'title_image' => $post->title_image,
            'image' => $post->image,
            'navs' => $navs,
            'icons' => $icons,
            'logo' => $logo,


        ];
        $this->view('posts/edit', $data);
      }
      
    }

    public function delete($id){
    
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Get existing post form model
        $post = $this->postModel-> getPostById($id);
        // check for owner 
        if(isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin'] != 1){
          redirect('posts');
        }

        if($this->postModel->deletePost($id)){
          flash('post_message', 'Beitrag wurde gelöscht');
          redirect('posts');
        }else{
          die('Etwas ist schiefgelaufen');
        }
        
    
      }else{
        redirect('posts');
      }
    }

    

}