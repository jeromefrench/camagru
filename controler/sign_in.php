<?php

if($method == "GET"){
	require '../vue/header.php';
	require '../vue/sign_in.html';
	require '../vue/footer.php';
}else if ($method == "POST"){
	session_start();
	require_once '../app/bdd_functions.php';
	$login = htmlspecialchars($_POST['login']);
	$passwd = htmlspecialchars($_POST['passwd']);
	$passwd = hash("sha256", $passwd);
	$conn = connection_bdd();
	if (!is_login_exist($conn, $login)) {
		header('Location: '.$fullDomain.'/sign-in');
		exit;
	}
	if (!is_login_and_password_match($conn, $login, $passwd)) {
		header('Location: '.$fullDomain.'/sign-in');
		exit;
	}
	$_SESSION['logon'] = true;
	$_SESSION['login'] = $login;
	header('Location: '.$fullDomain);
	exit;
} else {
	echo "404 error";
}

?>
