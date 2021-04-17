<?php require APPROOT . '/views/inc/header.php';?>
<?php require APPROOT . '/views/inc/navbar.php';?>

<div class="container">
<div class="row">
<div class="col-md-6 mx-auto py-5">
<form method="post" action="<?php echo URLROOT ;?>/users/login">
  <div class="card card-body bg-light my-5">
  <?php flash('register_success') ;?>
    <h2>Einloggen</h2>

    <div class="form-group">
      <label for="email">Email: <sup>*</sup></label>
      <input type="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '';?>" name="email" value="<?php echo $data['email'] ;?>">
      <span class="invalid-feedback"><?php echo $data['email_err'] ;?></span>
     
    </div>
    <div class="form-group">
      <label for="password">Passwort: <sup>*</sup></label>
      <input type="password" class="form-control <?php echo(!empty($data['password_err'])) ? 'is-invalid' : '';?>" name="password" value="<?php echo $data['password'] ;?>">
      <span class="invalid-feedback"><?php echo $data['password_err'] ;?></span>
    </div>
   
    <div class="d-flex justify-content-between row">
    <div class="col">
    <button type="submit" class="btn btn-primary btn-block ">Einloggen</button>
    </div>
    <div class="col">
    <div> <a href ="<?php echo URLROOT ;?>/users/register" class="btn">Haben Sie kein Konto ?<strong> Registrieren</strong></a> </div>
    </div>
    </div>

</form>
</div>
</div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>