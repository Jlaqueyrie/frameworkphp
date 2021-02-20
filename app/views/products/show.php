<?php require APPROOT . '\views\inc\header.php'; ?>
<div class="row">
    <div class="col-md-4">
        <img src="<?=URLROOT?>img/products/<? $product->img;?> alt="<?=$product->name;?> class="img-fluid">
    </div>
    <div class="col-md-8">
        <h1><?=$product->name;?></h1> 
    </div>
</div>
<?php $product = $data['product'];?>