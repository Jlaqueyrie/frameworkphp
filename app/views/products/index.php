<?php require APPROOT . '\views\inc\header.php'; ?>

<h1 class="text-primary text-center"><?php echo $data['title']?></h1>

<div class="row">

    <?php foreach($data['products'] as $product):?>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= URLROOT;?>img/products/<?=$product->img?>" alt="<?=$product->name?>">
                <div class="card-body">
                    <h5 class="card-title"><?=$product->name?></h5>
                    <p class="price"><?= number_format($product->price_vat,2)?>€</p>
                    <a href="<?= URLROOT?>products/show/<?= $product->id?>" class="btn btn-primary">Voir le produit</a>
                </div>
            </div>
        </div>
    <?php endforeach;?>

</div>

<?php require APPROOT . '\views\inc\footer.php'; ?>