<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col">
        <div class="card card-body bg-light">
            <h1 class="text-center">Inscription</h1>

            <form action="<?php echo URLROOT;?>users/register" method="POST">
                <div class="form-group">
                    <label>Votre nom<sup>*</sup></label>
                    <input type="text" class="form-control mb-2 <?php echo(!empty($data['err_name'])) ? 'is-invalid' :'';?>" name="f_u_name" value="<?php echo $data['name']?>">
                    <span class="invalid-feedback"><?php echo $data['err_name']?></span>
                </div>
                <div class="form-group">
                    <label>Votre pseudo<sup>*</sup></label>
                    <input type="text" class="form-control mb-2 <?php echo (!empty($data['err_pseudo'])) ? 'is-invalid' :'';?>" name="f_u_pseudo" value="<?php echo $data['pseudo']?>">
                    <span class="invalid-feedback"><?php echo $data['err_pseudo']?></span>
                </div>
                <div class="form-group">
                    <label>Votre email<sup>*</sup></label>
                    <input type="text" class="form-control mb-2 <?php echo (!empty($data['err_email'])) ? 'is-invalid' :'';?>" name="f_u_email" value="<?php echo $data['email']?>">
                    <span class="invalid-feedback"><?php echo $data['err_email']?></span>
                </div>
                <div class="form-group">
                    <label>Votre mot de passe<sup>*</sup></label>
                    <input type="text" class="form-control mb-2 <?php echo (!empty($data['err_password'])) ? 'is-invalid' :'';?>" name="f_u_password" value="<?php echo $data['password']?>">
                    <span class="invalid-feedback"><?php echo $data['err_password']?></span>
                </div>
                <div class="form-group">
                    <label>confirmer le mot de passe<sup>*</sup></label>
                    <input type="text" class="form-control mb-2 <?php echo (!empty($data['err_confirm_password'])) ? 'is-invalid' :'';?>" name="f_u_password_conf" value="<?php echo $data['confirm_password']?>">
                    <span class="invalid-feedback"><?php echo $data['err_confirm_password']?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="s'inscrire" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT?>users/login" class="btn btn-info btn-block">déjà inscrit? connecter vous</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>