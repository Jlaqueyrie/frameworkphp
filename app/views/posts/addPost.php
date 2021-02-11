<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="border">
    <h1> ajout article </h1>
    <form action="<?php echo URLROOT?>posts/addpost" method="POST">
        <div class="form-group">
            <label>Titre de l'article</label>
            <input type="text" class="form-control mb-2 <?php echo(!empty($data['err_title'])) ? 'is-invalid' : '';?>" name="f_u_title" value="<?php echo $data['title']?>">
            <span class="invalid-feedback"><?php echo $data['err_title']?></span>
        </div>
        <div class="form-group">
            <label>Rédiger vôtre article</label>
            <textarea class="form-control mb-2 <?php echo(!empty($data['err_articleContent'])) ? 'is-invalid' : '';?>"  rows="10" cols="20" name="f_u_content" value="<?php echo $data['articleContent']?>"></textarea>
            <span class="invalid-feedback"><?php echo $data['err_articleContent']?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Publier">
        </div>
    </form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>