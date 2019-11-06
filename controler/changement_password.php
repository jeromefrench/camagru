<?php
require_once '../app/bdd_functions.php';
require '../vue/header.php';
$conn = connection_bdd();
$login = $match_route->_slug;
$numero = $match_route->_id;

if (!isset($_POST['submit']))
{
	require '../vue/new_password_form.php';
}
else
{
	$passwd1 = $_POST['passwd1'];
	$passwd2 = $_POST['passwd2'];
	$numero = $_POST['numero'];
	$login = $_POST['login'];
	if (is_numero_and_login_match_new_passwd($conn, $login, $numero)
		&& $passwd1 === $passwd2
		&& $passwd2 != null)
	{
		update_password($conn, $login, $passwd1);
		echo "<p>Le password a ete change</p>";
	}
}
require '../vue/footer.php';
?>
