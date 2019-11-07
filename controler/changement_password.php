<?php
require_once '../app/bdd_functions.php';
require '../vue/header.php';
$conn = connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
$login = $match_route->_slug;
$numero = $match_route->_id;

if (!isset($_POST['submit']))
{
	require '../vue/new_password_form.php';
}
else
{
	$passwd1 = htmlspecialchars($_POST['passwd1']);
	$passwd2 = htmlspecialchars($_POST['passwd2']);
	$numero = htmlspecialchars($_POST['numero']);
	$login = htmlspecialchars($_POST['login']);
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
