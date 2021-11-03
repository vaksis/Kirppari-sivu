<?php
include "./views/partials/formhead.view.php";
?>

<div class="register">
<form method="post">

<label for="type">paikka tyyppi</label><br>
<select name="type">
    <option value="balnket">viltti</option>
    <option value="carslot">autopaikka</option>
</select><br>
<br>
<label for="slotnumber">paikkanumero</label><br>



<?php 
$carslot = $MarketInfo[0]["carslot"];
$slotnums = range(1, $carslot);

// remove reserved
$reservedslots = array_map(function ($item) {
    return $item["slotnumber"];
}, $allreserved);

// poista varatut
$freeslots = array_diff($slotnums, $reservedslots);

//var_dump($MarketInfo);?>

<select name="slotnumber">
<?php
foreach( $freeslots as $i):?>
    <option value='<?=$i?>'><?=$i?></option>
<?php endforeach;?>
</select><br>

<br>
<input type="submit" value="varaa paikka"><br>
</div>