<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if(isset($_SESSION['user_is_admin']) &&  ($_SESSION['user_is_admin']) == 1 ) :?>




<div class="row">
  <div class="col-12 text-right my-2">

    <div class="d-flex justify-content-end">
      <a href="<?php echo URLROOT; ?>/navs/add" class="btn btn-primary pr-3 mb-1 d-flex  align-self-center">
        <i class='fas fa-plus mr-2'></i> Navlink hinzufügen
      </a>
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
<?php flash('header_message') ;?>


<!--Carousel-->
    <?php if(isset($_SESSION['user_is_admin']) &&  ($_SESSION['user_is_admin']) == 1) :?>
<div class="row">
  <div class="col-12 text-right my-2">      
    <hr class="mb-2" />
    <a class="btn btn-primary" href="<?php echo URLROOT ;?>/sliders/edit/<?php echo $data['slider']->id ;?>"> Slider
      ändern </a>
 </div>
</div>      
    <?php endif;?>
 
<div id="carouselExampleIndicators" class="carousel slide row" data-bs-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo PUBLICROOT . $data['slider']->image_1; ?>" class="d-block w-100 slide-h" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo PUBLICROOT . $data['slider']->image_2; ?>" class="d-block w-100 slide-h" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo PUBLICROOT . $data['slider']->image_3;?>" class="d-block w-100 slide-h" alt="...">
    </div>

  </div>
  <a class="carousel-control-prev" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </a>
  <a class="carousel-control-next" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </a>
</div>

<!--Carousel end-->

<!-- CONTAINER-->

<?php if(isset($_SESSION['user_is_admin']) &&  ($_SESSION['user_is_admin']) == 1) :?>
<div class="row">
  <div class="col-12 text-right my-2">
    <hr class="mb-2" />
    <a class="btn btn-primary mb-3" href="<?php echo URLROOT . '/headers/edit/'. $data['header']->id ;?>">Header
      ändern </a>
  </div>
</div>
<?php endif;?>

<div class="row justify-content-center">
  <h1 class="py-5"> <?php echo $data['header']->title ;?></h1>
</div>
<div class="container">
  <!---SECTION 1!-->
  <div class="row">
    <?php foreach($data['texts'] as $text) :?>
    <div class="col-sm-12 col-md-4 col-lg-4 py-5 ">
      <?php if(isset($_SESSION['user_is_admin']) &&  ($_SESSION['user_is_admin']) == 1) :?>
      <div class="row d-flex justify-content-start">
        <a class="btn btn-primary mb-3" href="<?php echo URLROOT . '/texts/edit/'. $text->id ;?>">Text-Section ändern
        </a>
      </div>
      <?php endif;?>

      <h2 class="mb-3"><?php echo $text->title;?></h2>
      <p><?php echo $text->text;?></p>
      <a href="<?php echo URLROOT . '/' . $text->button_link;?>"
        class="btn btn-primary text-uppercase"><?php echo $text->button_name; ?> </a>

    </div>
    <?php endforeach; ?>

    <div class="col-sm-12 col-md-4 col-lg-4 py-5 position"
      style="background-image:url(<?php echo  PUBLICROOT . $data['picture']->image?>);">

      <?php if(isset($_SESSION['user_is_admin']) && ($_SESSION['user_is_admin'] == 1)) : ?>

      <div class="row d-flex justify-content-start">
        <a class="btn btn-primary mb-3" href="<?php echo URLROOT . '/pictures/edit/'. $data['picture']->id ;?>">Bild
          ändern </a>
      </div>

      <?php endif ; ?>
    </div>

  </div>
</div>

<!---SECTION 1 END!-->
<hr class="my-5 w-25" />

<!---SECTION 2 !-->
<div class="row align-items-center">
  <div class="col-6 py-5 position" style="background-image:url(<?php echo  PUBLICROOT . $data['picture2']->image?>);">

    <?php if(isset($_SESSION['user_is_admin']) && ($_SESSION['user_is_admin'] == 1)) : ?>

    <div class="col-12 d-flex justify-content-start">
      <a class="btn btn-primary mb-3" href="<?php echo URLROOT . '/pictures/edit/'. $data['picture2']->id ;?>">Bild
        ändern </a>
    </div>

    <?php endif ; ?>
  </div>

  <div class="col-6 py-5 text-center">
    <a href="<?php echo URLROOT . $data['textsec']->link ;?>">
      <h2><?php echo $data['textsec']->title ;?> </h2>
      <p><?php echo $data['textsec']->text ;?> </p>
    </a>

    <?php if(isset($_SESSION['user_is_admin']) && ($_SESSION['user_is_admin'] == 1)) : ?>

    <div class="d-flex justify-content-end">
      <a class="btn btn-primary mb-3" href="<?php echo URLROOT . '/textssec/edit/'. $data['textsec']->id ;?>">Text
        ändern </a>
    </div>

    <?php endif ; ?>

    <div class="blog-icons">
      <i class="fa fa-paw"></i>
      <i class="fa fa-paw"></i>
      <i class="fa fa-paw"></i>
      <i class="fa fa-paw"></i>
      <i class="fa fa-paw"></i>
    </div>

  </div>
  <!---SECTION 2 END!-->
</div>

<!-- SECTION 3 -->
<div class="bg-light row mt-5">
  <div class="container">

    <div class="row py-5">
      <div class="col-12">
        <h1>Unsere fellige Kunden</h1>
      </div>
    </div>

    <div class="row bg-light ">

      <?php foreach($data['cats'] as $cat) :?>

      <div class="col-sm-12 col-md-4 col-lg-4 ">

        <div class="position card-height" style="background-image:url(<?php echo  PUBLICROOT . $cat->image; ?>);">
        </div>
        <div class="text-center mt-2">
          <a><?php echo ucwords($cat->name) ; ?></a>
          <p><?php echo $cat->district ;?></p>
        </div>


      </div>
      <?php endforeach; ?>
    </div>

  </div>
</div>

<!--SECTION 3 END-->
<hr class="my-5 w-25" />
<!--SECTION 4 -->
<h1 class="text-center mb-5">Fotoberichte von den Katzensittern in Hamburg
</h1>

<div class="row">
  <?php  foreach($data['stories'] as $story): ?>
  <div class=" col-sm-12 col-md-3 col-lg-3">
    <div class="position card-height" style="background-image:url(<?php echo PUBLICROOT . $story->image ;?>);"></div>
    <div class="text-center my-3">
      <a href="<?php echo URLROOT . 'stories/show/' . $storyId ;?>"> <?php echo ucwords($story->name) ;?> </a>
      <div class="i-orange py-3">
      <?php if($story->rating > 0) :?> 
            <div class="mb-3">
            <?php require APPROOT . '/views/inc/rating.php'; ?>
            </div>
        <?php else:?>  
            <div class="mb-3 i-orange">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            </div>  
        <?php endif ;?>
      </div>
    </div>

  </div>
  <?php endforeach ;?>
</div>
<!--SECTION 4 END-->

<!--SECTION 5 -->
<div class="bg-light row py-5">
  <?php foreach($data['reviews'] as $review) :?>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php echo $review->text;?>

        <div class="rating py-3">
          <?php require APPROOT . '/views/inc/rating.php'; ?>
        </div>

        <div><?php echo ucwords($review->name); ?></div>
      </div>
    </div>
  </div>
  <?php endforeach ?>

</div>
<!--SECTION 5 END-->


<?php if(isset($_SESSION['user_is_admin']) &&  ($_SESSION['user_is_admin']) == 1 ) :?>
<div class="row">
  <div class="col-12 text-right my-2">
    <hr class="mt-5" />
    <div class="d-flex justify-content-end align-items-center">
      <a class="btn btn-primary mr-3 d-flex  align-self-center" href="<?php echo URLROOT ;?>/icons/add"> <i
          class="fas fa-plus mr-2"> </i> Icon hinzufügen</a>
    </div>
  </div>
</div>
<?php endif;?>





<?php require APPROOT . '/views/inc/footer.php'; ?>