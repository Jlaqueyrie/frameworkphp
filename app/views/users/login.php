<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col">
        <div class="card card-body bg-light">
            <h1 class="text-center">Connexion</h1>

            <form action="<?php echo URLROOT ?>users/login" method="POST">
                <label</label>
                <div class="form-group">
                    <label for="sel1">Authentification par :</label>
                    <select class="form-control" name="f_u_auth">
                        <option value="Email">Email</option>
                        <option value="Pseudo">Pseudo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Votre identifiant<sup>*</sup></label>
                    <input type="text" class="form-control mb-2 <?php echo (!empty($data['err_id'])) ? 'is-invalid' :'';?>" name="f_u_id" value="<?php echo $data['id']?>">
                    <span class="invalid-feedback"><?php echo $data['err_id']?></span>
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
                        <a href="<?= URLROOT?>users/register" class="btn btn-info btn-block">inscrivez vous</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>