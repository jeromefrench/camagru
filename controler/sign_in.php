<?php

if($method == "GET"){
	require $root.'/vue/header.php';
	require $root.'/vue/sign_in.html';
	require $root.'/vue/footer.php';
}
else if ($method == "POST"){
	require_once $root.'/app/bdd_functions.php';

	if (isset($_POST) && isset($_POST['login']) && isset($_POST['passwd'])){
		$login = htmlspecialchars($_POST['login']);
		$passwd = htmlspecialchars($_POST['passwd']);
	}
	else{
		$_SESSION['answer']['wrong'] = true;
		header('Location: '.$fullDomain.'/sign-in');
		exit;
	}
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
