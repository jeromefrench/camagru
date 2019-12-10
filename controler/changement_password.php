<?php
require_once '../app/bdd_functions.php';
require '../vue/header.php';
$conn = connection_bdd();
$login = $match_route->_slug;
$numero = $match_route->_id;

if (!isset($_POST['submit'])) {
	require '../vue/new_password_form.php';
}
else {
	$passwd1 = htmlspecialchars($_POST['passwd1']);
	$passwd2 = htmlspecialchars($_POST['passwd2']);
	$numero = htmlspecialchars($_POST['numero']);
	$login = htmlspecialchars($_POST['login']);
	if (is_numero_and_login_match_new_passwd($conn, $login, $numero)
		&& $passwd1 === $passwd2
		&& $passwd2 != null)
	{
		$passwd = hash("sha256", $passwd1);
		update_password($conn, $login, $passwd);
		echo "<p>Le password a ete change</p>";
	}
}
require '../vue/footer.php';
?>
