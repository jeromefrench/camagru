<?php

if($method == "GET"){
	require '../vue/header.php';
	require '../vue/sign_up_form.html';
	require '../vue/footer.php';
}
else if ($method == "POST"){
	require_once '../app/bdd_functions.php';
	$conn = connection_bdd();

	if (isset($_POST['login']) && isset($_POST['mail']) && isset($_POST['passwd'])){
		$login = htmlspecialchars($_POST['login']);
		$mail = htmlspecialchars($_POST['mail']);
		$passwd = htmlspecialchars($_POST['passwd']);
	}
	else {
		$_SESSION['answer']['wrong'] = true;
		header('Location: '.$fullDomain.'/sign-up');
		exit;
	}
	if ($login == "" || $mail == "" || $passwd == "" ) {
		$_SESSION['answer']['information_missing'] = true;
		header('Location: '.$fullDomain.'/sign-up');
		exit;
	}
	if (is_login_exist($conn, $login)) {
		$_SESSION['answer']['login_already_taken'] = true;
		header('Location: '.$fullDomain.'/sign-up');
		exit;
	}
	$user = [];
	$user['login'] = $login;
	$user['mail'] = $mail;
	$user['passwd'] = hash("sha256", $passwd);
	//$user['numero_unique'] = $numero;
	add_new_user_confirmation($conn, $user);
	require '../app/send_email_confirmation.php';
	$_SESSION['answer']['confirm_email'] = true;
	header('Location: '.$fullDomain);
	exit;
}
else {
	echo "404 error";
}
?>
