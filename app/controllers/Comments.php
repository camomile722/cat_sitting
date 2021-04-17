<?php 
class Comments extends Controller{

    public function __construct(){
       $this->commentModel = $this->model('Comment');
       $this->postModel = $this->model('Post');
       $this->userModel = $this->model('User');
       $this->navModel= $this->model('Nav');
       $this->iconModel = $this->model('Icon');
       $this->logoModel = $this->model('Logo');

    }
    public function add($postId){
        $navs = $this->navModel->getNavLinks();
        $icons = $this->iconModel->getIcons();
        $logo = $this->logoModel->getLogoById(1);
        // if submitted 
        if($_SERVER['REQUEST_METHOD'] == 'POST' ){
            // validate 
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // validated data
            $data = [
                'post_id' => $postId,
                'body_comment' => trim($_POST['body_comment']),
                'navs' => $navs,
                'icons' => $icons,
                'logo'=> $logo,

                'user_id' => $_SESSION['user_id'],
                'body_comment_err' => ''             
            ];
            // if empty input
            if(empty($data['body_comment'])){
                $data['body_comment_err'] = 'Bitte geben Sie den Text ein';
            }
            // if no errors
            if(empty($data['body_comment_err'])){

                if($this->commentModel->addComment($data)){
                    flash('comment_message', 'Kommentar wurde hinzugefügt');
                    redirect('posts/show/'.$postId);
                }else{
                    die('Etwas ist schief gelaufen');
                }
               

            }else{
                // show errors
                $this->view('comments/add', $data);
            }

        }else{
            // check for owner 
            if(!isset($_SESSION['user_id'])){
                redirect('posts');
            }
            $data = [
                'body_comment' => '',
                'body_comment_err' => '',
                'post_id' => $postId,
                'navs' => $navs,
                'icons' => $icons,
                'logo' => $logo,
            ];

            
            $this-> view( 'comments/add', $data);
        }
        
    }
    public function edit($id){
        // header nav
        $navs = $this->navModel->getNavLinks();
        $icons = $this->iconModel->getIcons();
        $logo = $this->logoModel->getLogoById(1);
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // validate input
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $comment = $this->commentModel->getCommentById($id);

            $data = [
                'id' => $id,
                'post_id' => $comment->post_id,
                'body_comment' => trim($_POST['body_comment']),
                'user_id' => $_SESSION['user_id'],
                'navs' => $navs,
                'icons' => $icons,
                'logo' => $logo,
                
                'body_comment_err' => '',
            ];
            // if empty input 
            if(empty($data['body_comment'])){
                $data['body_comment_err'] = 'Bitte geben Sie den Text ein';
            }
            // validated
            if(empty($data['body_comment_err'])){
                if($this->commentModel->updateComment($data)){
                    $comment = $this->commentModel->getCommentById($id);
                    flash('comment_message', 'Kommentar wurde geändert');
                    redirect('posts/show/'. $comment->post_id);
                    }else{
                      die('Etwas ist schiefgelaufen');
                    }
                   }else{
                       // show errors
                       $this->view('comments/edit', $data);
                   }
                
        }else{
            // Get existing comment form model
            $comment = $this->commentModel->getCommentById($id); 
            
            // CHECK for owner 
            if($_SESSION['user_is_admin'] != 1){
                redirect('posts');
            }
        $data = [
            'id' => $id,
            'comment' => $comment,
            'user_id' => $_SESSION['user_id'],
            'body_comment' => $comment->body_comment,
            'post_id' =>  $comment->post_id,
            'navs' => $navs,
            'icons' => $icons,
            'logo' => $logo,
            
            'body_comment_err' => '',
        ];
        $this-> view( 'comments/edit', $data);
    }
    }

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             // Get existing comment form model
             $comment = $this->commentModel->getCommentById($id);
            // check owner 
            if($comment->user_id != $_SESSION['user_id'] && $_SESSION['user_is_admin'] != 1){
                redirect('posts');
            }

            if($this->commentModel->deleteComment($id)){   flash('comment_message', 'Kommentar wurde gelöscht');
                redirect('posts/show/'. $comment->post_id);
            }else{
                die('Etwas ist schiefgelaufen');
            }

        }else{
            redirect('posts');
        }
    }
}

?>