<?php
/*
* App Core Class
* Creates URL & loads core controller
* URL FORMAT - /controller/method/params
*/

class Core{
    protected $currentController = "Home";
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
       // print_r($this->getUrl());
        //Array ( [0] => edit [1] => 1 )
        $url = $this->getUrl();
        // look in controllers for first value (example: edit) ucwords - capitalised the first letter
        if(!empty($url[0]) &&file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
        // if exisists, set as controller
        $this->currentController = ucwords($url[0]);  
        // Unset 0 Index 
        unset($url[0]); 
        }

        // Require the Controller on this url 
        require_once '../app/controllers/' . $this->currentController . '.php';
        // Instantiate controller class
        $this->currentController = new $this->currentController;
        // $pages = new Pages;

        //check for second part of the url post/about - about will be a method in class Post
        if(isset($url[1])){
            //Check to see if method exists in controller
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                //Unset 1 index
                unset($url[1]);
            }

        }
       // echo $this->currentMethod;
       // Get params
       // if there are params - add it to array, if not - just empty array
       $this->params = $url ? array_values($url) : [];
       // Call a Callback with array of params
       call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }

    public function getUrl(){
        //echo $_GET['url'];
        // get http://localhost:8888/blog/index.php?url=test -> shows test
        // if we have an url index
        if(isset($_GET['url'])){
            // add to each url   '/'
            $url = rtrim($_GET['url'],'/');
            // check for url string
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // into an array /post/edit/1 [post, edit, 1]
            $url = explode('/', $url);
            return $url;
        }

    }

}