<?php
session_start();
require_once 'bdd_functions.php';
$login = $_SESSION['login'];

$conn = connection_bdd();
if (isset($_POST['submit']) && $_POST['submit'] == "I change my login")
{
	$new_login = htmlspecialchars($_POST['login']);
	if (is_login_exist($conn, $new_login))
	{
		header('Location: https://localhost:8080/');
		exit;
	}
	update_login($conn, $login, $new_login);
	$_SESSION['login'] = $new_login;
	header('Location: https://localhost:8080/');
	exit;
}
else if (isset($_POST['submit']) && $_POST['submit'] == "I change my email adress")
{
	$new_mail = htmlspecialchars($_POST['mail']);
	echo $new_mail;
	update_mail($conn, $login, $new_mail);
	//update the adresse email
	header('Location: https://localhost:8080/');
	exit;
}
else if (isset($_POST['submit']) && $_POST['submit'] == "I change my password")
{
	$new_passwd1 = htmlspecialchars($_POST['passwd1']);
	echo $new_passwd1;
	$new_passwd2 = htmlspecialchars($_POST['passwd2']);
	echo $new_passwd2;
	if (($new_passwd2 != $new_passwd1) || $new_passwd1 === "" )
	{
		header('Location: https://localhost:8080/');
		exit;
	}
	else
	{
		update_passwd($conn, $login, $new_passwd1);
	}
	header('Location: https://localhost:8080/');
	exit;
}
else if (isset($_POST['submit']) && $_POST['submit'] == "I change notification")
{

	if ($_POST['notification'] == '1')
		$notification = "1";
	else
		$notification = "0";
		update_notification($conn, $login, $notification);
	header('Location: https://localhost:8080/');
}
else
{
	header('Location: https://localhost:8080/');
}


?>
