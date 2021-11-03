<?php
include "./views/partials/eventhead.view.php";
?>


<div class="col-sm-6">
<?php foreach($events as $event):?>
  <?php $url = $event['img']; ?>
    <div class="card" style="width: 600px;">
      <div class="card-body" style="background-color: white">
      <img class="card-img-top" src="<?= $url ?>" alt="Card image cap" style="width: 100%">
        <h4 class="card-title">kirpputori autotalli</h4>
        <h5 class="card-title"><?= $event["description"] ?></h5>
        <a href="./index.php?action=register" class="btn btn-primary">rekisteröidy ja varaa paikka</a>
        <a href="./index.php?action=login" class="btn btn-primary">Kirjaudu ja varaa paikka</a>
        <a href="./index.php?action=products" class="btn btn-primary">selaa tuotteita</a>
      </div>
    </div>
    <?php endforeach;?>
  </div>

<?php
include "./views/partials/end.php";
?>