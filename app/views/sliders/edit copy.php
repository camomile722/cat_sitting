<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-9 col-md-9 mx-auto">
            <a href="<?php echo URLROOT;?>/home" class="btn btn-secondary light"><strong>Zurück</strong></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9 col-md-9 mx-auto">
            <div class="card card-body bg-light my-5">

                <h2>Slider ändern</h2>


                <form action="<?php echo URLROOT; ?>/sliders/edit/<?php echo $data['id'] ;?>" method="post"
                    enctype="multipart/form-data">

                    <img src=" <?= PUBLICROOT . $data['image_1'] ?>" alt="" width="30%" height="auto">
         
                    <div class="form-group">        
                        <label for="image_1">Slider 1 Upload: <sup>*</sup></label>
                        <input type="file" name="image_1" class="form-control <?php echo (!empty($data['image_1_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['slider']->image_1; ?>"/>
                        <span class="invalid-feedback"><?php echo $data['image_1_err']; ?></span>
                        </div> 
                        <img src=" <?= PUBLICROOT . $data['image_2'] ?>" alt="" width="30%" height="auto">   
                        <div class="form-group">        
                        <label for="image_2">Slider 2 Upload: <sup>*</sup></label>
                        <input type="file" name="image_2" class="form-control <?php echo (!empty($data['image_2_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['slider']->image_2; ?>"/>
                        <span class="invalid-feedback"><?php echo $data['image_2_err']; ?></span>
                        </div> 

                        <img src=" <?= PUBLICROOT . $data['image_3'] ?>" alt="" width="30%" height="auto">

                        <div class="form-group">        
                        <label for="image_3">Slider 3 Upload: <sup>*</sup></label>
                        <input type="file" name="image_3" class="form-control <?php echo (!empty($data['image_3_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['slider']->image_3; ?>"/>
                        <span class="invalid-feedback"><?php echo $data['image_3_err']; ?></span>
                        </div> 

                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Speichern" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>