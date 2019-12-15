<?php

if($method == "GET"){
	$log = htmlspecialchars($match_route->_slug);
	$numero = htmlspecialchars($match_route->_id);
	require $root.'/vue/header.php';
	require $root.'/vue/new_password_form.php';
	require $root.'/vue/footer.php';
}
else if ($method == "POST"){
	require_once $root.'/app/bdd_functions.php';
	require_once $root.'/app/strong_passwd.php';
	$conn = connection_bdd($root);
	$log = htmlspecialchars($match_route->_slug);
	$numero = htmlspecialchars($match_route->_id);

	if (isset($_POST) && isset($_POST['passwd1']) && isset($_POST['passwd2'])){
		$passwd1 = htmlspecialchars($_POST['passwd1']);
		$passwd2 = htmlspecialchars($_POST['passwd2']);
	}
	else {
		$_SESSION['answer']['wrong'] = true;
		header('Location: '.$fullDomain.'/changement-password/'.$log.'/'.$numero);
		exit;
	}
	if ($passwd1 !== $passwd2 || $passwd1 === ""){
		$_SESSION['answer']['two_passwd_different'] = true;
		header('Location: '.$fullDomain.'/changement-password/'.$log.'/'.$numero);
		exit;
	}
	if (!is_numero_and_login_match_new_passwd($conn, $log, $numero)){
		$_SESSION['answer']['false_link'] = true;
		header('Location: '.$fullDomain.'/changement-password/'.$log.'/'.$numero);
		exit;
	}
	$ans = isPasswdStrong($passwd1);
	if ($ans !== true){
		$_SESSION['answer']['passwdWeak'] = true;
		$_SESSION['answer']['message'] = $ans;
		header('Location: '.$fullDomain.'/changement-password/'.$log.'/'.$numero);
		exit;
	}
	$passwd = hash("sha256", $passwd1);
	update_passwd($conn, $log, $passwd);
	$_SESSION['answer']['passwd_change'] = true;
	header('Location: '.$fullDomain.'/sign-in');
}
else {
	echo "404 error";
}

?>
