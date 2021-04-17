<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>
<div class="row bg-image">
  <div class="col-lg-4 col-md-4 col-sm-12 ">

    <div class="card card-body bg-light my-5">
      <h2>Konto erstellen</h2>
      <form action="<?php echo URLROOT; ?>/users/register" method="post">

        <div class="form-group">
          <label for="name">Username: <sup>*</sup></label>
          <input type="text" name="name"
            class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['name']; ?>">
          <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>

        <div class="form-group">
          <label for="email">Email: <sup>*</sup></label>
          <input type="email" name="email"
            class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['email']; ?>">

          <span class="invalid-feedback"><?php echo $data['email_err'] ;?></span>
        </div>

        <div class="form-group">
          <label for="district">Bezirk: <sup>*</sup></label>
          <span class="invalid-feedback"><?php echo $data['district_err'] ;?></span>

          <select
            class="form-control form-control-lg <?php echo (!empty($data['district_err'])) ? 'is-invalid' : ''; ?>"
            name="district" value="<?=isset($data['district']) ? $data['district'] = $data['district'] : '' ?>">
            <span class="invalid-feedback"><?php echo $data['district_err'] ;?></span>

            <option value="0" selected
              class="input form-control form-control-lg <?php echo (!empty($data['district_err'])) ? 'is-invalid' : ''; ?>" ">Ihren Bezirk wählen&hellip;</option>
      <span class=" invalid-feedback"><?php echo $data['district_err'] ;?></span>

            <option value="Hamburg-Mitte"
              <?php echo (isset($data['district']) && $data['district'] === 'Hamburg-Mitte') ? 'selected ="selected"': '';?>
              class="form-control form-control-lg <?php echo (!empty($data['district_err'])) ? 'is-invalid' : ''; ?>">
              Hamburg-Mitte</option>

            <option value="Altona"
              <?php echo (isset($data['district']) && $data['district'] === 'Altona') ? 'selected = "selected"': '';?>>
              Altona</option>
            <option value="Eimsbüttel"
              <?php echo (isset($data['district']) && $data['district'] === 'Eimsbüttel') ? 'selected = "selected"': '';?>>
              Eimsbüttel</option>
            <option value="Hamburg-Nord"
              <?php echo (isset($data['district']) && $data['district'] === "Hamburg-Nord") ? 'selected = "selected"': '';?>>
              Hamburg-Nord</option>
            <option value="Wandsbek"
              <?php echo (isset($data['district']) && $data['district'] === "Wandsbek") ? 'selected = "selected"': '';?>>
              Wandsbek</option>Wandsbek</option>
            <option value="Bergedorf"
              <?php echo (isset($data['district']) && $data['district'] === "Bergedorf") ? 'selected = "selected"': '';?>>
              Bergedorf</option>Bergedorf</option>
            <option value="Harburg"
              <?php echo (isset($data['district']) && $data['district'] === "Harburg") ? 'selected = "selected"': '';?>>
              Harburg</option>Harburg</option>
          </select>

        </div>
        
        <div class="form-group">
        <label for="is_catsitter">Katzensitter oder Katzensittersucher: <sup>*</sup></label>
          <select class="form-control form-control-lg <?php echo (!empty($data['is_catsitter_err'])) ? 'is-invalid' : ''; ?>"" name="is_catsitter" value="<?=isset($data['is_catsitter']) ? $data['is_catsitter'] = $data['is_catsitter'] : '' ?>">
          <span class=" invalid-feedback"><?php echo $data['is_catsitter'] ;?></span>
            <option value=0 selected>Regiestrierung als&hellip;</option>
            <option value=1>Katzensitter</option>
            <option value=2>Katzensittersucher</option>
          </select>
        </div>


        <div class="form-group">
          <label for="password">Passwort: <sup>*</sup></label>

          <input type="password" name="password"
            class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['password']; ?>">

          <span class="invalid-feedback"><?php echo $data['password_err'] ;?></span>
        </div>


        <div class="form-group">
          <label for="confirm_password">Passwort wiederholen: <sup>*</sup></label>
          <input type="password" name="confirm_password"
            class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"
            value="<?php echo $data['confirm_password']; ?>">
          <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>

        <div class="form-group">
          <input type="hidden" name="is_admin" class="form-control form-control-lg" value="0">
        </div>
   
        <div class="row">
          <div class="col">
            <input type="submit" value="Registrieren" class="btn btn-primary btn-block">
          </div>
          <div class="col">
            <a href="<?php echo URLROOT;?>/users/login" class="btn  btn-block">Haben Sie schon ein Konto?
              <b>Einloggen</b></a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>