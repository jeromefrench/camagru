<?php

if($method == "GET"){
	require '../vue/header.php';
	require '../vue/sign_in.html';
	require '../vue/footer.php';
}
else if ($method == "POST"){
	require_once '../app/bdd_functions.php';
	$login = htmlspecialchars($_POST['login']);
	$passwd = htmlspecialchars($_POST['passwd']);
	$passwd = hash("sha256", $passwd);
	$conn = connection_bdd();
	if (!is_login_exist($conn, $login)) {
		$_SESSION['answer']['login_dont_exit'] = true;
		header('Location: '.$fullDomain.'/sign-in');
		exit;
	}
	if (!is_login_and_password_match($conn, $login, $passwd)) {
		$_SESSION['answer']['login_and_passwd_doesnt_match'] = true;
		header('Location: '.$fullDomain.'/sign-in');
		exit;
	}
	$_SESSION['logon'] = true;
	$_SESSION['login'] = $login;
	$_SESSION['answer']['connexion_sucessfull'] = true;
	header('Location: '.$fullDomain);
	exit;
}
else {
	echo "404 error";
}

?>
