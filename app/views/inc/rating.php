
<?php if($story->rating >= 5) :?>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>

<?php elseif ($story->rating >= 4.5): ?>

          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fas fa-star-half-alt"></i>
  
<?php elseif ($story->rating >= 4): ?>

          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
      
<?php elseif ($story->rating >= 3.5): ?>

          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fas fa-star-half-alt"></i>
  
<?php elseif ($story->rating >= 3): ?>

          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>

<?php elseif ($story->rating >= 2.5): ?>

          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
          <i class="fas fa-star-half-alt"></i>


<?php elseif ($story->rating >= 2): ?>

          <i class="fa fa-paw"></i>
          <i class="fa fa-paw"></i>
       
<?php elseif ($story->rating >= 1.5): ?>

          <i class="fa fa-paw"></i>
          <i class="fas fa-star-half-alt"></i>

<?php elseif ($story->rating >= 1): ?>
       <i class="fa fa-paw"></i>
<?php endif ;?>

