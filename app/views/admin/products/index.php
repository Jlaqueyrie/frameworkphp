<?php require APPROOT . '\views\inc\header.php'; ?>

<div class="row">
  <div class="col-md-8">
    <h1 class="text-primary text-center"> <?= $data['title']; ?><button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#add_product">Ajout produit</button></h1>
  </div>
  <table class="table table-stripped text-primary">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Prix HT</th>
        <th>Prix TTC</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $products = $data['products']; ?>
      <?php foreach ($products as $product) : ?>
      
        <tr>
          <td><img width="60" src="<?=URLROOT?>img/products/<?=$product->img?>" alt="image produit"> </td>
          <td><?= $product->name; ?></td>
          <td><?= $product->price_wo_vat; ?></td>
          <td><?= $product->price_vat; ?></td>
          <td>
            <a href="" class="btn btn-warning">Editer</a>
            <a href="" class="btn btn-danger">Supprimer</a>
          </td>
        </tr>

      <?php endforeach ?>
    </tbody>
  </table>
  <div class="col-md-4">
    <?php include APPROOT . '\views\inc\side_bar_admin.php' ?>
  </div>
</div>

<?php require APPROOT . '\views\inc\footer.php'; ?>

<div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="add_product" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveaux produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Nom Produit</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="form-group">
            <label for="naprice_ht">Prix HT</label>
            <input type="text" class="form-control" name="price_wo_vat" id="price_wo_vat" required>
          </div>
          <div class="form-group">
            <label for="img">image produit</label>
            <input type="file" class="form-control" name="img" id="img" required>
          </div>
          <div class="form-group">
            <label for="description">Description produit</label>
            <textarea  class="form-control" name="description" id="description" required></textarea>
          </div>
          <button type="submit" class="btn btn-success">Ajouter produit</button>
        </form>
      </div>
      </div>
    </div>
  </div>