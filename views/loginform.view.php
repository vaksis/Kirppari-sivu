<?php
include "./views/partials/formhead.view.php";
?>

<div class="register">
<form method="post">

<label for="username">Käyttäjätunnus</label><br>
<input type="text" name="username" required><br>


<label for="password">Salasana</label><br>
<input type="password" name="password" required><br>


<input type="submit" value="kirjaudu"><br>
</div>

</form>

<?php
include "./views/partials/end.php";
?>