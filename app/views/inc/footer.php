  <!--FOOTER-->
  <div class=" row footer py-3">
    <div class="container">
      <div class="row py-4 justify-content-around align-items-center">

            <ul class="nav-item">
              <li class="nav-link">Blog</li>
              <li class="nav-link">AGBs</li>
              <li class="nav-link">Datenschutz</li>
            </ul>
            <ul class="nav-item">
              <li class="nav-link">Impressum</li>
              <li class="nav-link">Versicherung</li>
              <li class="nav-link">Bewertungen</li>
            </ul>
  

        <div class="d-flex align-items-center">
          <h2 class="pr-5 d-block"> Folge uns </h2>

          <div class="footer-icons">

          <?php foreach($data['icons'] as $icon) : ?>            
          <div class="d-flex ">
            <a href="<?php echo ($icon->name == 'email') ? 'mailto:' : ''; echo $icon->link ;?>"><img
              src="<?php echo PUBLICROOT . $icon->image  ;?>" alt="<?php echo $icon->name; ?>" class="icons mx-3" /></a>
          <?php if(isset($_SESSION['user_is_admin']) &&  ($_SESSION['user_is_admin']) == 1 ) :?>
          <div class="d-flex py-3 px-3">
          <a class="primary" href="<?php echo URLROOT ;?>/icons/edit/<?php echo $icon->id ;?> "> <i
                class="fas fa-pen mr-3"></i></a>

          <form action="<?php echo URLROOT;?>/icons/delete/<?php echo $icon->id;?>" method="post">
            <sup> <input type="submit" value="x" class="btn-danger p-2 mr-5"></sup>
          </form>
          </div>
          </div>
          <?php endif ; ?>


          <?php endforeach ;?>
          </div>


        </div>
      </div>

      <!--FOOTER END-->


    </div>
    <!-- CONTAINER end-->
  </div>

  <script src="<?= URLROOT . '/js/main.js' ?>"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
    integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>



  </body>

  </html>