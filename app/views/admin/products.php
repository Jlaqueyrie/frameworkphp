
<?php require APPROOT . '\views\inc\header.php'; ?>

<div class="row">
    <div class="col-md-8">
        <h1 class="text-center"><?= $data['title'];?></h1>
        <table class="table table-stripped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix HT</th>
                <th>Prix TTC</th>
                <th>Prix TTC</th>
            </tr>
        </thead>
        <tbody>
            <?php $products = $data['products']; ?>
            <?php foreach($products as $product): ?>
               <tr>
                <td><?= $product->name;?></td> 
                <td><?= $product->price_wo_vat;?>€</td> 
                <td><?= $product->price_vat;?>€</td> 
                <td>
                    <a href="" class="btn btn-warning">Editer</a>
                    <a href="" class="btn btn-danger">Supprimer</a>
                </td> 

               </tr> 
            <?php endforeach?>

        </tbody>
        </table>
    </div>

    <div class="col-md-4">
        <?php include APPROOT.'\views\inc\side_bar_admin.php'?>
    </div>



</div>

<?php require APPROOT . '\views\inc\footer.php'; ?>