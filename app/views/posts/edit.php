<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-9 col-md-9 mx-auto">
            <a href="<?php echo URLROOT;?>/posts/show/<?php echo $data['id']; ?>" class="btn btn-secondary light"><strong>Zurück</strong></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9 col-md-9 mx-auto">
            <div class="card card-body bg-light my-5">

                <h2>Beitrag ändern</h2>
               
                <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id'] ;?>" method="post"
                    enctype="multipart/form-data">

                    <div class="form-group">
                       <img class="card-img "
                            src="<?php echo  PUBLICROOT . $data['image'] ; ?>" />
                               
                     </div>         
                     <div class="form-group">
                     <label for="title_image">Fototitel: <sup>*</sup></label>
                        <input class="form-control <?php echo (!empty($data['title_image_err'])) ? 'is-invalid' : ''; ?>" type="text" name="title_image"
                            value="<?php echo $data['title_image']; ?>"> <br>
                        <span class="invalid-feedback"><?php echo $data['title_image_err']; ?></span>
                        </div> 
                    <div class="form-group">  
                    
                        <label for="image">Upload: <sup>*</sup></label>
                        <input type="file" name="image" class="form-control <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['image']; ?>"/>
                        <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
                        </div> 
                     <div class="form-group">         
                        <label for="title">Title: <sup>*</sup></label>
                        <input type="text" name="title"
                            class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $data['title']; ?>">
                        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                    </div>
                   

                    <div class="form-group">
                        <label for="body">Text: <sup>*</sup></label>
                        <textarea name="body"
                            class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']; ?></textarea>
                        <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
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