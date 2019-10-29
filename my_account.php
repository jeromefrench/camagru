<?php
//verifier que l'on est log

?>
<h1>My information</h1>
<form method="post" action="my_account_traitement.php">
	<p>Login :</br> <input type="text" name="login" value="<?=$_SESSION['login']?>"></p>
	<p>Mail adresse :</br><input type="text" name="mail" value="<?=$_SESSION['mail']?>"></p>
	<p>Password :</br><input type="password" name="passwd" value="<?=$_SESSION['passwd']?>"></p>
	<p><input type="submit" name="submit" value="Change"></p>
</form>
