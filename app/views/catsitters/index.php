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

<div class="container">
<div class="row py-5">
<div class="col-12">
    <h1 class="text-center">Katerbetreung vor Ort!</h1>
</div>
</div> 

<div class="row">
    <div class="col-12">
    <p>Machen Sie sich keine Sorgen mehr, wenn Sie in den Urlaub fahren möchten, weil Ihre Katze in sicheren Händen ist. Hier können Sie sehr schnel einen guten Katzensitter in Ihrer Nähe finden!</p>
    </div> 
</div>   

<div class="row justify-content-center">
<div class="col-12">

<form class="d-flex justify-content-center pt-5" action="<?=  URLROOT . '/catsitters/search'?>" method="post">

  <select class="select-box" name="district"  value = "<?=isset($data['district']) ? $data['district'] = $data['district'] : '' ?>">
    <option value="0" selected>Ihren Bezirk wählen&hellip;</option>
    <option value="Hamburg-Mitte"<?php echo (isset($data['district']) && $data['district'] === 'Hamburg-Mitte') ? 'selected ="selected"': '';?>>Hamburg-Mitte</option>
    <option value="Altona"       <?php echo (isset($data['district']) && $data['district'] === 'Altona') ? 'selected = "selected"': ''; ?>>Altona</option>
    <option value="Eimsbüttel"   <?php echo (isset($data['district']) && $data['district'] === 'Eimsbüttel') ? 'selected = "selected"': '';?>>Eimsbüttel</option>
    <option value="Hamburg-Nord" <?php echo (isset($data['district']) && $data['district'] === "Hamburg-Nord") ? 'selected = "selected"': '';?>>  Hamburg-Nord</option>
    <option value="Wandsbek"     <?php echo (isset($data['district']) && $data['district'] === "Wandsbek") ? 'selected = "selected"': '';?>> Wandsbek</option>Wandsbek</option>
    <option value="Bergedorf"    <?php echo (isset($data['district']) && $data['district'] === "Bergedorf") ? 'selected = "selected"': '';?>> Bergedorf</option>Bergedorf</option>
    <option value="Harburg"      <?php echo (isset($data['district']) && $data['district'] === "Harburg") ? 'selected = "selected"': '';?>> Harburg</option>Harburg</option>

</select>
  <input class="search-button ml-2" type="submit" name="" value="Suchen">
</form>


</div> 
</div>

<div class="row">
    <div class="col-12 text-center py-5">
    <hr class="pb-5 w-25">    
    <h1>Beste Katzensitter in Hamburg</h1>
    </div>  
</div>    


<div class="row py-2 mb-5">
    <?php foreach( $data['catsitters'] as $catsitter) :?>
    <div class="col-sm-12 col-md-4 col-ld-4 text-center ">
        <div class="position mb-3 card-img" style="background-image:url(<?php echo PUBLICROOT . $catsitter->avatar;?>);">
        </div>  
        <a href=""><?php echo ucwords($catsitter->name) ; ?></a> 
        <p><?php echo ucwords($catsitter->district) ; ?></p> 
        <?php if($catsitter->rating > 0) :?> 
            <div class="mb-5 i-orange">
            <?php require APPROOT . '/views/inc/rating_catsitter.php'; ?>
            </div>
        <?php else:?>  
            <div class="mb-5 i-orange">
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            </div>  
        <?php endif ;?>
    </div> 
    <?php endforeach; ?>
</div>    

</div>








<?php require APPROOT . '/views/inc/footer.php'; ?>