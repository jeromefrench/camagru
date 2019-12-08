<?php
session_start();
require_once 'bdd_functions.php';
$login = htmlspecialchars($_POST['login']);
$passwd = htmlspecialchars($_POST['passwd']);
$conn = connection_bdd();

if (!is_login_exist($conn, $login)) {
	header('Location: '.$fullDomain.'/sign-in');
	exit;
}

$conn = connection_bdd();
if (!is_login_and_password_match($conn, $login, $passwd)) {
	header('Location: '.$fullDomain.'/sign-in');
	exit;
}

$_SESSION['logon'] = true;
$_SESSION['login'] = $login;
header('Location: '.$fullDomain);
exit;
?>
