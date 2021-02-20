<?php require APPROOT . '\views\inc\header.php'; ?>

<?php $product = $data['product'] ?>

<div class="row">
    <div class="col-md-4">
        <img src="<?= URLROOT ?>img/products/<?= $product->img; ?>" alt="<?= $product->name; ?>" class="img-fluid">
    </div>
    <div class="col-md-8">
        <h1 class="text-primary"><?= $product->name; ?></h1>
        <p class="text-primary"><?= $product->description ?></p>
        <div class="row">
            <div class="col-md-8">
                <h2 class="price text-primary">
                    <?= number_format($product->price_vat, 2) ?>€
                </h2>
            </div>
            <div class="col-md-4">
                <label class="text-primary">Quantité : </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="button">-</button>
                    </div>
                    <input type="text" value="1" readonly  data-max="" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">+</button>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-lg float-right add_t_cart" data-price="<?= number_format($product->price_vat,2)?>" data-url="">Ajouter au panier</button>
    </div>
</div>
<?php $product = $data['product']; ?>

<?php require APPROOT . '\views\inc\footer.php'; ?>