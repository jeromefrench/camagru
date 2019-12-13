<?php
<<<<<<< HEAD


if($method == "GET"){

	require '../vue/header.php';
	require '../vue/new_password_form.php';
	require '../vue/footer.php';

}else if ($method == "POST"){

	require_once '../app/bdd_functions.php';
	$conn = connection_bdd();

	if (isset($_POST['passwd1']) && isset($_POST['passwd2'])){
		$new_passwd1 = htmlspecialchars($_POST['passwd1']);
		$new_passwd2 = htmlspecialchars($_POST['passwd2']);
	}
	else {
		$_SESSION['answer']['wrong'] = true;
		header('Location: '.$fullDomain.'/changement-password');
		exit;
	}
	$login = htmlspecialchars($match_route->_slug);
	$numero = htmlspecialchars($match_route->_id);
	if ($passwd1 != $passwd2 || $passwd1 != ""){
		$_SESSION['answer']['two_passwd_different'] = true;
		header('Location: '.$fullDomain.'/changement-password');
		exit;
	}
	else if (!is_numero_and_login_match_new_passwd($conn, $login, $numero)){
		$_SESSION['answer']['false_link'] = true;
		header('Location: '.$fullDomain.'/changement-password');
		exit;
	}
	$passwd = hash("sha256", $passwd1);
	update_password($conn, $login, $passwd);
	$_SESSION['answer']['passwd_change'] = true;
	header('Location: '.$fullDomain.'/sign-in');
}
else {
	echo "404 error";
}

=======
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
		$passwd1 = hash("sha256", $passwd1);
		update_password($conn, $login, $passwd1);
		echo "<p>Le password a ete change</p>";
	}
}
require '../vue/footer.php';
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
?>
