<?php
session_start();
require_once 'bdd_functions.php';
$login = $_SESSION['login'];

$conn = connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
if (isset($_POST['submit']) && $_POST['submit'] == "I change my login")
{
	$new_login = htmlspecialchars($_POST['login']);
	if (is_login_exist($conn, $new_login))
	{
		header('Location: http://localhost:8080/');
		exit;
	}
	update_login($conn, $login, $new_login);
	$_SESSION['login'] = $new_login;
	header('Location: http://localhost:8080/');
	exit;
}
else if (isset($_POST['submit']) && $_POST['submit'] == "I change my email adress")
 {
	$new_mail = htmlspecialchars($_POST['mail']);
	echo $new_mail;
	update_mail($conn, $login, $new_mail);
	//update the adresse email
	header('Location: http://localhost:8080/');
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
		header('Location: http://localhost:8080/');
		exit;
	}
	else
	{
		$new_passwd1 = hash("sha256", $new_passwd1);
		update_passwd($conn, $login, $new_passwd1);
	}
	header('Location: http://localhost:8080/');
	exit;
}
else if (isset($_POST['submit']) && $_POST['submit'] == "I change notification")
{

	if ($_POST['notification'] == '1')
		$notification = "1";
	else
		$notification = "0";
		update_notification($conn, $login, $notification);
	header('Location: http://localhost:8080/');
}
else
{
	header('Location: http://localhost:8080/');
}


?>
