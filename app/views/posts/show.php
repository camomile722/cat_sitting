<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php flash('post_message') ;?>
<?php flash('comment_message'); ?>


<!-- Blog Cards -->
<div class="container">
  <div class="row d-flex justify-content-center">

    <div class="col-sm-12 col-md-9 col-lg-9 py-5">

      <div class="pb-3">
        <a href="<?php echo URLROOT;?>/posts" class="btn btn-secondary light"><strong>Zurück</strong></a>
      </div>

      <hr />
      <?php if(isset($_SESSION['user_id']) && $data['post']->user_id == $_SESSION['user_id'] || isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin'] == 1)  :?>
      <div class="d-flex justify-content-end">
        <a href="<?php echo URLROOT;?>/posts/edit/<?php echo $data['post']->id ;?>"
          class="btn btn-primary px-3 mb-3 mr-3">Edit</a>
        <form action="<?php echo URLROOT;?>/posts/delete/<?php echo $data['post']->id;?>" method="post">
          <input type="submit" value="Löschen" class="btn btn-danger">
        </form>
      </div>
      <?php endif; ?>
    
      
      <div class="position image_height" style="background-image:url('<?php echo PUBLICROOT . $data['post']->image ; ?>')">
      </div>

      <h2 class="py-3 mt-5">
      <i class="fa fa-paw"></i> <?php echo $data['post']->title ; ?>
      </h2>
      <p class="card-text py-3"><?php echo $data['post']->body ;?></p>
      <p class="card-text "><?php echo ucwords($data['user']->name) ;?> am <?php echo $data['post']->created_at ;?></p>

      <hr />
      <div class="pb-2 d-flex justify-content-end">
        <button class="btn"><i class="fas fa-heart"></i></button>
      </div>

      <hr />

      <h2 class="mt-5">Kommentare</h2>
   
      <div class=" py-3">
        <?php foreach ($data['comments'] as $comment) :?>
        <div class=" py-3">
          <p><?php echo $comment->body_comment ;?></p>
          <p><?php echo ucwords($comment->name) ;?> <?php echo $comment->commentCreated ;?></p>
        </div>

        <?php if(isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin'] == 1) : ?>
        <div class="d-flex">
          <a href="<?php echo URLROOT ;?>/comments/edit/<?php echo $comment->commentId;?>"
            class="btn btn-primary mb-3 mr-3">Edit
          </a>

          <form action="<?php echo URLROOT;?>/comments/delete/<?php echo $comment->commentId;?>" method="post">
            <input type="submit" value="Löschen" class="btn btn-danger">
          </form>
        </div>
        <?php endif?>

        <?php endforeach;?>
      </div>

      <?php if(isset($_SESSION['user_id'])) : ?>
      <a href="<?php echo URLROOT ;?>/comments/add/<?php echo $data['post']->id; ?>" class="btn btn-info my-5">Add
      </a>
      <?php endif?>

    </div>
  </div>
</div>
</div>
<!--BLOG CARDS END-->
<!--FOOTER-->
<?php require APPROOT . '/views/inc/footer.php'; ?>