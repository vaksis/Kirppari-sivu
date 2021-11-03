<?php require "./views/partials/eventhead.view.php";?>


<div class="col-third">
<?php foreach($products as $product):?>
    <?php $url = $product['img']; ?>
        <div class="card col-6 col-md-4" style="width: 100%;">
        <img class="card-img-top" src="<?= $url ?>" alt="Card image cap" style="width: 40%">
        <div class="card-body">
        <h4 class="card-title"><?= $product["description"] ?></h4>
        <p class="card-text"><?= $product["price"] ?>€</p>
        <p class="card-text"><?= $product["category"] ?></p>
            </div>
            </div>
    <?php endforeach ?>
</div>
</div>
<?php require "./views/partials/end.php";