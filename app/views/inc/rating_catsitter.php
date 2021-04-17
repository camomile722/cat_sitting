
<?php if($catsitter->rating >= 5) :?>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>

<?php elseif ($catsitter->rating >= 4.5): ?>

          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fas fa-star-half-alt"></i>
  
<?php elseif ($catsitter->rating >= 4): ?>

          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
      
<?php elseif ($catsitter->rating >= 3.5): ?>

          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fas fa-star-half-alt"></i>
  
<?php elseif ($catsitter->rating >= 3): ?>

          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>

<?php elseif ($catsitter->rating >= 2.5): ?>

          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fas fa-star-half-alt"></i>


<?php elseif ($catsitter->rating >= 2): ?>

          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
       
<?php elseif ($catsitter->rating >= 1.5): ?>

          <i class="fa fa-paw"></i>
          <i class="fas fa-star-half-alt"></i>

<?php elseif ($catsitter->rating >= 1): ?>
       <i class="fa fa-paw"></i>
<?php endif ;?>



