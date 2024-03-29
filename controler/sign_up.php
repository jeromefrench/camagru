<?php

if($method == "GET"){
	require $root.'/vue/header.php';
	require $root.'/vue/sign_up_form.html';
	require $root.'/vue/footer.php';
}
else if ($method == "POST"){
	require_once $root.'/app/strong_passwd.php';
	$conn = connection_bdd($root);
	if (isset($_POST) && isset($_POST['login']) && isset($_POST['mail']) && isset($_POST['passwd'])){
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
	$ans = isPasswdStrong($passwd);
	if ($ans !== true){
		$_SESSION['answer']['passwdWeak'] = true;
		$_SESSION['answer']['message'] = $ans;
		header('Location: '.$fullDomain.'/sign-up');
		exit;
	}
	$user = [];
	$user['login'] = $login;
	$user['mail'] = $mail;
	$user['passwd'] = hash("sha256", $passwd);
	$numero = rand(0, 1000000);
	$user['numero_unique'] = $numero;
	add_new_user_confirmation($conn, $user);
	$domain_name = $fullDomain;
	$page = "confirmation";
	$corp = $domain_name."/".$page."/".$login."/".$numero;
	mail ($mail, 'Email de confirmation', $corp);
	$_SESSION['answer']['confirm_email'] = true;
	header('Location: '.$fullDomain);
	exit;
}
else {
	echo "404 error";
}
?>
