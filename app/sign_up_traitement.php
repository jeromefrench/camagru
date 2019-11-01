<?php
session_start();
require_once 'bdd_functions.php';

$login =  $_POST['login'];
$mail = $_POST['mail'];
$passwd = $_POST['passwd'];
if ($login != null && $mail != null && $passwd != null)
{
	//on verifie que l'on a toute les informations
	$user = [];
	$user['login'] = $login;
	$user['mail'] = $mail;
	$user['passwd'] = $passwd;
}
else
{
	header('Location: https://37.187.109.62/sign_up');
}


$conn = connection_bdd();
if (is_login_exist($conn, $login))
{
	/* echo "le login existe deja"; */
	header('Location: https://37.187.109.62/sign_up');
}
else
{
	/* echo "ok on te rajoute dans la base de donnee"; */
	add_new_user($conn, $user);
	$_SESSION['logon'] = true;
	$_SESSION['login'] = $login;
	header('Location: https://37.187.109.62/home');
}

?>
