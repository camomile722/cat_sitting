<?php require APPROOT . '/views/inc/header.php'; ?>



<?php if(isset($_SESSION['user_is_admin']) &&  ($_SESSION['user_is_admin']) == 1 ) :?>
<div class="container">
  <div class="row">
    <div class="col-12 text-right my-2">

      <div class="col d-flex justify-content-end">
        <a href="<?php echo URLROOT; ?>/navs/add" class="btn btn-primary pr-3 mb-1 d-flex  align-self-center">
          <i class='fas fa-plus mr-2'></i> Navlink hinzufügen
        </a>

      </div>
    </div>
  </div>
</div>
<?php endif;?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>


  <?php flash('post_message') ;?>
  <?php flash('nav_message') ;?>
  <?php flash('slider_message') ;?>
  <?php flash('text_message') ;?>
  <?php flash('icon_message') ;?>


<div class="text-center py-5">
  <h1>Tipps für Katzenliebhaber!</h1>
</div>

<div class="row py-3 mb-5 bg-light">
  <div class="container">
    <div class="row">
      <h2>Erfahrungen und Testberichte von den aktuellen Trends.</h2>
    </div>
  </div>
</div>

<!-- CONTAINER-->
<div class="container">

  <!-- Blog Cards -->
  <?php if(isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin'] == 1)  :?>
  <hr class="my -5" />
  <div class="row">
    <div class="col d-flex justify-content-end">
      <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pr-3 mb-3 d-flex  align-self-center">
        <i class='fas fa-plus mr-2'></i> Beitrag hinzufügen
      </a>
    </div>
  </div>
  <?php endif; ?>

  <?php foreach($data['posts'] as $post) :?>
  <div class="row py-3 align-items-center">

    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="position my-5" style="background-image:url('<?php echo PUBLICROOT . $post->image ; ?>')">
      </div>
    </div>  
    <div class="col-sm-12 col-md-6 col-lg-6">
      <div class="">    
      <h2 class=""><i class="fa fa-paw"></i> <?php echo $post->title ; ?></h2>

        <p class="card-text ov-hidden"><?php echo $post->body ;?></p>
        <p class=""><?php echo ucwords($post->name) ;?> <?php echo $post->postCreated; ?></p>

        <div class="d-flex justify-content-end py-2">
          <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId ;?>" class="btn btn-primary p-2">Weiter lesen</a>
        </div>
      </div>
      </div>
  
  </div>
  <hr/>
  <?php endforeach; ?>

  <!--BLOG CARDS END-->
  <!--FOOTER-->
  <div class="container">
    <div class="row">
      <div class="col-12 text-right my-2">
        <?php if(isset($_SESSION['user_is_admin']) &&  ($_SESSION['user_is_admin']) == 1 ) :?>
        <hr class="mt-5" />
        <div class="d-flex justify-content-end align-items-center">
          <a class="btn btn-primary mr-3 d-flex  align-self-center" href="<?php echo URLROOT ;?>/icons/add"> <i
              class="fas fa-plus mr-2"> </i> Icon hinzufügen</a>
        </div>
        <?php endif;?>
      </div>
    </div>
  </div>
  </div>


  <?php require APPROOT . '/views/inc/footer.php'; ?>