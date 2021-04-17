<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar.php'; ?>


<div class="container my-5">
    <div class="row">
        <div class="col-lg-9 col-md-9 mx-auto">
            <a href="<?php echo URLROOT;?>/posts/show/<?php echo $data['post_id']; ?>"
                class="btn btn-secondary light"><strong>Zurück</strong></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9 col-md-9 mx-auto">
            <div class="card card-body bg-light my-5">





                <h2>Kommentar hinzufügen</h2>
                <form action="<?php echo URLROOT; ?>/comments/add/<?php echo $data['post_id']; ?>" method="post">


                    <div class="form-group">
                        <?php echo $data['body_comment']; ?>
                        <div class="form-group" ">
<label for=" body_comment">Text: <sup>*</sup></label>
                            <textarea name="body_comment"
                                class="form-control form-control-lg <?php echo (!empty($data['body_comment_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body_comment']; ?></textarea>
                            <span class="invalid-feedback"><?php echo $data['body_comment_err']; ?></span>

                            <input type="hidden" name="post_id" class="form-control form-control-lg"
                                value="<?php echo $data['post_id']; ?>">

                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Hinzufügen" class="btn btn-primary btn-block">
                            </div>
                        </div>

                </form>

            </div>

        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>