<?php
require_once '../app/bdd_functions.php';
require '../vue/header.php';
$conn = connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);

if (!isset($_POST['submit']))
{
	require '../vue/sign_up_form.html';
}
else
{
	$login = htmlspecialchars($_POST['login']);
	$mail = htmlspecialchars($_POST['mail']);
	$passwd = htmlspecialchars($_POST['passwd']);
	if ($login == null || $mail == null || $passwd == null)
	{
		require '../vue/une_information_manque.html';
		require '../vue/sign_up_form.html';
	}
	else
	{
		if (is_login_exist($conn, $login))
		{
			require '../vue/login_deja_pris.php';
			require '../vue/sign_up_form.html';
		}
		else
		{
			require '../vue/email_confirmation.php';
			require '../app/send_email_confirmation.php';
			$user = [];
			$user['login'] = $login;
			$user['mail'] = $mail;
			$user['passwd'] = hash("sha256", $passwd);
			$user['numero_unique'] = $numero;
			add_new_user_confirmation($conn, $user);
		}
	}
}
require '../vue/footer.php';
?>
