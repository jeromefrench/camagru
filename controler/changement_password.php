<?php


if($method == "GET"){

	require '../vue/header.php';
	require '../vue/new_password_form.php';
	require '../vue/footer.php';

}else if ($method == "POST"){

	require_once '../app/bdd_functions.php';
	$conn = connection_bdd();

	if (isset($_POST['passwd1']) && isset($_POST['passwd2'])){
		$new_passwd1 = htmlspecialchars($_POST['passwd1']);
		$new_passwd2 = htmlspecialchars($_POST['passwd2']);
	}
	else {
		$_SESSION['answer']['wrong'] = true;
		header('Location: '.$fullDomain.'/changement-password');
		exit;
	}
	$login = htmlspecialchars($match_route->_slug);
	$numero = htmlspecialchars($match_route->_id);
	if ($passwd1 != $passwd2 || $passwd1 != ""){
		$_SESSION['answer']['two_passwd_different'] = true;
		header('Location: '.$fullDomain.'/changement-password');
		exit;
	}
	else if (!is_numero_and_login_match_new_passwd($conn, $login, $numero)){
		$_SESSION['answer']['false_link'] = true;
		header('Location: '.$fullDomain.'/changement-password');
		exit;
	}
	$passwd = hash("sha256", $passwd1);
	update_password($conn, $login, $passwd);
	$_SESSION['answer']['passwd_change'] = true;
	header('Location: '.$fullDomain.'/sign-in');
}
else {
	echo "404 error";
}

?>
