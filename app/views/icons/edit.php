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

                <h2>Icon ändern</h2>

                <form action="<?php echo URLROOT; ?>/icons/edit/<?php echo $data['id'] ;?>" method="post"
                    enctype="multipart/form-data">
           
                    <img src=" <?= PUBLICROOT . $data['image']; ?>" alt="<?php echo $data['name'];?>" class="bg-dark w-25 p-2">
         
                    <div class="form-group">        
                        <label for="image">Icon Upload: <sup>*</sup></label>
                        <input type="file" name="image" class="form-control <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['image']; ?>"/>
                        <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
                        </div> 
                        <div class="form-group">         
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" name="name"
                            class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $data['name']; ?>">
                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                    </div>    
                    <div class="form-group">         
                        <label for="link">Link: <sup>*</sup></label>
                        <input type="text" name="link"
                            class="form-control form-control-lg <?php echo (!empty($data['link_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $data['link']; ?>">
                        <span class="invalid-feedback"><?php echo $data['link_err']; ?></span>
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