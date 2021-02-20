<?php require APPROOT . '\views\inc\header.php'; ?>

<div class="row">
    <div class="col-md-4">
        <?php include APPROOT . '\views\inc\side_bar_admin.php' ?>
    </div>
    <div class="col-md-8">
        <h1 class="text-center text-primary"><?= $data['title']; ?><button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addProduct">
                ajouter un nouveaux produit
            </button>
        </h1>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="text-primary">Nom</th>
                    <th class="text-primary">Prix HT</th>
                    <th class="text-primary">Prix TTC</th>
                    <th class="text-primary">Prix TTC</th>
                </tr>
            </thead>
            <tbody>
                <?php $products = $data['products']; ?>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td class="text-primary">
                            <img src="<?= URLROOT?>img/products/<?= $product->img?>" width="60" class="mr-2">
                            <?= $product->name; ?>

                        </td>
                        <td class="text-primary"><?= $product->price_wo_vat; ?>€</td>
                        <td class="text-primary"><?= $product->price_vat; ?>€</td>
                        <td>
                            <a href="" class="btn btn-warning">Editer</a>
                            <a href="" class="btn btn-danger">Supprimer</a>
                        </td>

                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>


    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fiche nouveaux produit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="add" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label> Nom Produit </label>
                            <input type="text" class="form-control" name="produit" id="name" required>
                        </div>
                        <div class="form-group">
                            <label>Prix acheté</label>
                            <input type="text" class="form-control" name="price_wo_vat" id="price_wo_vat" required>
                        </div>
                        <div class="form-group">
                            <label>Image produit</label>
                            <input type="file" class="form-control" name="img" id="img" required>
                        </div>
                        <div class="form-group">
                            <label>Description produit</label>
                            <textarea type="text" class="form-control" name="description" id="description"  maxlength="250" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require APPROOT . '\views\inc\footer.php'; ?>