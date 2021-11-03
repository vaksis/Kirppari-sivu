<?php
include "./views/partials/formhead.view.php";
?>

<div class="register">
<form method="post">

<label for="username">Käyttäjätunnus</label><br>
<input type="text" name="username" required><br>

<label for="email">Sähköposti</label><br>
<input type="email" name="email" required><br>

<label for="password">Salasana</label><br>
<input type="password" name="password" required><br>

<label for="password2">Salasana uudelleen</label><br>
<input type="password" name="password2" required><br>

<input type="submit" value="Rekisteröi käyttäjä"><br>
</div>

</form>

<?php
include "./views/partials/end.php";
?>


