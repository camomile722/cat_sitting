<?php
  class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
      $this->navModel= $this->model('Nav');
      $this->iconModel = $this->model('Icon');
      $this->logoModel = $this->model('Logo');
    }

    public function register(){
      $navs = $this->navModel->getNavLinks();
      $icons = $this->iconModel->getIcons();
      $logo = $this->logoModel->getLogoById(1);
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
  
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'name' => trim($_POST['name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'is_admin' => trim($_POST['is_admin']),
          'district' => trim($_POST['district']),
          'is_catsitter' => trim($_POST['is_catsitter']),
          'navs' => $navs,
          'logo' => $logo,
          'icons'=>$icons,

          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'district_err' => '',
          'is_catsitter_err' => ''
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Bitte geben Sie Ihre Email-Adresse ein';
        }else {
          // Check Email
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = 'Email existiert schon';
          }
        }

        // Validate Name
        if(empty($data['name'])){
          $data['name_err'] = 'Bitte geben Sie Ihren Namen ein';
        }
        // Validate District
        if(empty($data['district'])){
          $data['district_err'] = 'Bitte wählen Sie Ihren Bezirk';
        }
        // Validate catsiter
        if(empty($data['is_catsitter'])){
          $data['is_catsitter_err'] = 'Bitte wählen Sie';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Bitte geben Sie Ihr Passwort ein';
        } elseif(strlen($data['password']) < 8){
          $data['password_err'] = 'Passwort muss mindestens 8 Zeichen lang sein';
        }

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Bitte wiederholen Sie Ihr Passwort';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwörter stimmen nicht überein';
          }
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['district_err']) && empty($data['is_catsitter_err'])){
          // Validated
          //die('SUCCESS');
          //Hash Password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          // Register User
          if($this->userModel->register($data)){
          // Redirect to login  
            flash('register_success', 'Sie sind registriert und können sich einloggen');
            redirect('users/login');
          }else{
            die('etwas ist schiefgelaufen');
          }

        } else {
          // Load view with errors
          $this->view('users/register', $data);
        }

      } else {
        // Init data
        $data =[
          'name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'district' => '',
          'is_catsitter' => '',
          'navs' => $navs,
          'logo' => $logo,
          'icons'=>$icons,

          'name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'district_err' => '',
          'is_catsitter_err' => '',
        ];

        // Load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      $navs = $this->navModel->getNavLinks();
      $icons = $this->iconModel->getIcons();
      $logo = $this->logoModel->getLogoById(1);
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'navs' => $navs,
          'icons' => $icons,
          'logo' => $logo,

          'email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Bitte geben Sie Ihre Email-Adresse ein';
        } 

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Bitte geben Sie Ihr Passwort ein';
        }elseif(strlen($data['password']) < 8){
          $data['password_err'] = 'Passwort muss mindestens 8 Zeichen lang sein';
        }
        // Check for user/email 
        if($this->userModel->findUserByEmail($data['email'])){
          // User found
        }else{
          $data['email_err'] = 'User existiert nicht';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          //die('SUCCESS');
          // Check and set logged in User
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
              // create Session
               // die('SUCCESS');
               $this->createUserSession($loggedInUser);

          } else{
              $data['password_err'] = 'Passwort ist falsch';
            // display errors
              $this->view('user/login', $data);
          }
          
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'navs' => $navs,
          'logo' => $logo,
          'icons' => $icons,
          
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_is_admin'] = $user->is_admin;
        redirect('home');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_is_admin']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }
 
   


}