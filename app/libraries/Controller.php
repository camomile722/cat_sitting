<?php
/*
 * Base Controller
 * Loads the models and views
*/ 

class Controller{
    // Load model
    public function model($model){
    // Require model file
    require_once '../app/models/' .  $model . '.php';  
    // Instantiate model
    return new $model();
    //return new Post();

    }

    // Load view 
    public function view($view, $data = []){
      // Check for the view file   
      if(file_exists('../app/views/' . $view . '.php')){    
      // if exists - require this file    
          require_once '../app/views/' . $view . '.php';
      }else{
      // if view doesn't exists  - die - stop the app
      die('View does not exists');
      }
    }
}