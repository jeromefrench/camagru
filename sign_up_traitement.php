<?php
session_start();
require_once 'bdd_functions.php';

$login =  $_POST['login'];
$mail = $_POST['mail'];
$passwd = $_POST['passwd'];
if ($login != null && $mail != null && $passwd != null)
{
	$user = [];
	$user['login'] = $login;
	$user['mail'] = $mail;
	$user['passwd'] = $passwd;
	/* $_SESSION['logon'] = true; */
	/* $_SESSION['login'] = $login; */
	/* $_SESSION['mail'] = $mail; */
	/* $_SESSION['passwd'] = $passwd; */
}
else
{
	header('Location: http://localhost:8080/sign_up');
}
$conn = connection_bdd();
if (is_login_exist($conn, $login))
{
	/* echo "le login existe deja"; */
	header('Location: http://localhost:8080/sign_up');
}
else
{
	/* echo "ok on te rajoute dans la base de donnee"; */
	add_new_user($conn, $user);
	$_SESSION['logon'] = true;
	$_SESSION['login'] = $login;
	header('Location: http://localhost:8080/home');
}

?>
