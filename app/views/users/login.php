<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col mt-5">
        <div class="card card-body bg-light mt-5">
            <h1 class="text-center">Connexion</h1>

            <form action="<?php echo URLROOT ?>users/login" method="POST">
                <div class="form-group">
                    <label>Votre email<sup>*</sup></label>
                    <input type="text" class="form-control mb-2 <?php echo (!empty($data['err_email'])) ? 'is-invalid' :'';?>" name="f_u_email" value="<?php echo $data['email']?>">
                    <span class="invalid-feedback"><?php echo $data['err_email']?></span>
                </div>
                <div class="form-group">
                    <label>Votre mot de passe<sup>*</sup></label>
                    <input type="text" class="form-control mb-2 <?php echo(!empty($data['err_password'])) ? 'is-invalid' :'';?>" name="f_u_password" value="<?php echo $data['password']?>">
                    <span class="invalid-feedback"><?php echo $data['err_password']?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-success btn-block" value = "Se connecter">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT?>users/register" class="btn btn-light btn-block">Pas encore inscrit, inscrivez vous</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>