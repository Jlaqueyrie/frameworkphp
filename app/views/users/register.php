<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col mt-5">
        <div class="card card-body bg-light mt-5">
            <h1 class="text-center">Inscription</h1>

            <form action="<?php echo URLROOT;?>users/register" method="post">
                <div class="form-group">
                    <input type="text" class="form-control mb-2 <?php echo (!empty($data['err_name'])) ? 'is-invalid' :'';?>" name="f_u_name" id="f_reg_nom" aria-describedby="helpId" placeholder="Votre nom" required>
                    <span class="invalid-feedback"><?php echo $data['err_name']?></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control mb-2 <?php echo (!empty($data['err_email'])) ? 'is-invalid' :'';?>" name="f_u_email" id="f_reg_nom" aria-describedby="helpId" placeholder="Votre email" required>
                    <span class="invalid-feedback"><?php echo $data['err_email']?></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control mb-2 <?php echo (!empty($data['err_password'])) ? 'is-invalid' :'';?>" name="f_u_password" id="f_reg_nom" aria-describedby="helpId" placeholder="entrez un mot de pass" required>
                    <span class="invalid-feedback"><?php echo $data['err_password']?></span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control mb-2 <?php echo (!empty($data['err_confirm_password'])) ? 'is-invalid' :'';?>" name="f_u_password_conf" id="f_reg_nom" aria-describedby="helpId" placeholder="confirmer votre mot de pass" required>
                    <span class="invalid-feedback"><?php echo $data['err_confirm_password']?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="s'inscrire" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT?>users/login" class="btn btn-light btn-block">déjà inscrit?, connecter vous</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>