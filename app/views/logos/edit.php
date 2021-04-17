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

                <h2>Logo ändern</h2>


                <form action="<?php echo URLROOT; ?>/logos/edit/<?php echo $data['id'] ;?>" method="post"
                    enctype="multipart/form-data">

                    <img src=" <?= PUBLICROOT . $data['image'] ?>" alt="" width="30%" height="auto">
         
                    <div class="form-group">        
                        <label for="image">Logo Upload: <sup>*</sup></label>
                        <input type="file" name="image" class="form-control <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['logo']->image; ?>"/>
                        <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
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