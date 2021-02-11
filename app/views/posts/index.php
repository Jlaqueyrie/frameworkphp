<?php require APPROOT . '\views\inc\header.php' ?>

<div class="row">
    <div class="col-md-8 ml-3">
        <h1>Articles</h1>
        <a href="" class="btn btn-info pull-right">
            <i class="fas fa-pencil-alt"></i>
            ajouter un article 
        </a>
    </div>
</div>
<section>
    <?php foreach($data['posts'] as $post):?>
        <article class="card card-body">
            <h4 class="card card-title"><?php echo $post->title?></h4>
            <p class="card card-text"><?php echo $post->content?></p>
            <span>Ecrit par:</span>
        </article>

    <?php endforeach;?>

</section>
<?php require APPROOT . '\views\inc\footer.php' ?>