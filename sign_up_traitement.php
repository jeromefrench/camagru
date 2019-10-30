<?php
session_start();
$login =  $_POST['login'];
$mail = $_POST['mail'];
$passwd = $_POST['passwd'];
if ($login != null && $mail != null && $passwd != null)
{
	$_SESSION['logon'] = true;
	$_SESSION['login'] = $login;
	$_SESSION['mail'] = $mail;
	$_SESSION['passwd'] = $passwd;
	header('Location: http://localhost:8080/home');
}
else
{
	header('Location: http://localhost:8080/sign_up');
}

?>
