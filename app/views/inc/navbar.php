
  <div class="row bg-light">
    <div class="col-lg-12 col-md-12">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a href="<?php echo URLROOT; ?>" class="navbar-brand"> <img class="navbar-brand"
            src="<?php echo PUBLICROOT . $data['logo']->image ; ?>" /></a>
        <?php if(isset($_SESSION['user_is_admin']) &&  ($_SESSION['user_is_admin']) == 1 ) :?>

        <a class="primary" href="<?php echo URLROOT ;?>/logos/edit/<?php echo $data['logo']->id ;?> "> <sup><i
              class="fas fa-pen mr-3"></i></sup></a>

        <?php endif ; ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03"
          aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
          <ul class="navbar-nav m-auto">
            <?php foreach ($data['navs'] as $nav) :?>
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo URLROOT . $nav->link; ?>"><?php echo $nav->name ;?>
              </a>
            </li>
            <?php if(isset($_SESSION['user_is_admin']) &&  ($_SESSION['user_is_admin']) == 1 ) :?>

            <a class="primary" href="<?php echo URLROOT ;?>/navs/edit/<?php echo $nav->id ;?> "> <sup><i
                  class="fas fa-pen mr-3"></i></sup></a>

            <form action="<?php echo URLROOT;?>/navs/delete/<?php echo $nav->id;?>" method="post">
              <sup> <input type="submit" value="x" class="btn-danger p-2 mr-1"></sup>
            </form>

            <?php endif ; ?>
            <?php endforeach ;?>

            </ul>

            <?php if(isset($_SESSION['user_id'])) : ?>
              
            <li class="nav-link" href="#">Hallo <?php echo ucwords($_SESSION['user_name']);?>!</li>
            
            <a class="nav-link" href="<?php echo URLROOT . '/users/logout';?>">Logout</a>

            <?php else : ?>
            <a class="nav-link" href="<?php echo URLROOT . '/users/login';?>"><i class="fas fa-user"></i></a>
            <?php endif ?>

         



        </div>
      </nav>
    </div>
  </div>
