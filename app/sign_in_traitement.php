<?php
session_start();

require_once 'bdd_functions.php';

$login = $_POST['login'];
$passwd = $_POST['passwd'];
$conn = connection_bdd();


if (!is_login_exist($conn, $login))
{
	header('Location: https://37.187.109.62/sign-in');
	exit;
}

$conn = connection_bdd();
if (!is_login_and_password_match($conn, $login, $passwd))
{
	header('Location: https://37.187.109.62/sign-in');
	exit;
}

$_SESSION['logon'] = true;
$_SESSION['login'] = $login;
header('Location: https://37.187.109.62/');
exit;

?>





