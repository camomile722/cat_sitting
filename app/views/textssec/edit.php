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

                <h2>Text ändern</h2>
               
                <form action="<?php echo URLROOT; ?>/textssec/edit/<?php echo $data['id'] ;?>" method="post">
  
                     <div class="form-group">         
                        <label for="title">Title: <sup>*</sup></label>
                        <input type="text" name="title"
                            class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $data['title']; ?>">
                        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                    </div>
                   

                    <div class="form-group">
                        <label for="text">Text: <sup>*</sup></label>
                        <textarea name="text"
                            class="form-control form-control-lg <?php echo (!empty($data['text_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['text']; ?></textarea>
                        <span class="invalid-feedback"><?php echo $data['text_err']; ?></span>
                    </div>


                    <div class="form-group">
                        <label for="text">Link: <sup>*</sup></label>
                        <textarea name="link"
                            class="form-control form-control-lg <?php echo (!empty($data['link_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['link']; ?></textarea>
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