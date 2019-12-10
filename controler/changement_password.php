<?php


if($method == "GET"){

	require '../vue/header.php';
	require '../vue/new_password_form.php';
	require '../vue/footer.php';

}else if ($method == "POST"){

	require_once '../app/bdd_functions.php';
	$conn = connection_bdd();

	$login = $match_route->_slug;
	$numero = $match_route->_id;
	$passwd1 = htmlspecialchars($_POST['passwd1']);
	$passwd2 = htmlspecialchars($_POST['passwd2']);


	if ($passwd1 != $passwd2){
		$_SESSION['answer']['two_passwd_different'] = true;
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit;
	}
	else if (!is_numero_and_login_match_new_passwd($conn, $login, $numero)){
		$_SESSION['answer']['false_link'] = true;
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit;
	}
	else{
		$passwd = hash("sha256", $passwd1);
		update_password($conn, $login, $passwd);
		$_SESSION['answer']['passwd_change'] = true;
		header('Location: '.$fullDomain.'/sign-in');
	}
}
else {
	echo "404 error";
}

?>
