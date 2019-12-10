<?php


if($method == "GET"){
	require '../vue/header.php';
	require '../vue/sign_up_form.html';
	require '../vue/footer.php';
}
}else if ($method == "POST"){
	require_once '../app/bdd_functions.php';
	$conn = connection_bdd();


	$login = htmlspecialchars($_POST['login']);
	$mail = htmlspecialchars($_POST['mail']);
	$passwd = htmlspecialchars($_POST['passwd']);

	if ($login == null || $mail == null || $passwd == null ) {
		$_SESSION['answer']['information_missing'] = true;
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit();
	}
	else if ($login == "" || $mail == "" || $passwd == "" ) {
		$_SESSION['answer']['information_missing'] = true;
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit();
	}
	else if (is_login_exist($conn, $login)) {
		$_SESSION['answer']['login_already_taken'] = true;
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit();
	}
	else {
		$user = [];
		$user['login'] = $login;
		$user['mail'] = $mail;
		$user['passwd'] = hash("sha256", $passwd);
		$user['numero_unique'] = $numero;
		add_new_user_confirmation($conn, $user);
		require '../app/send_email_confirmation.php';
		$_SESSION['answer']['confirm_email'] = true;
		header('Location: '.$fullDomain);
		exit();
	}
}
else {
	echo "404 error";
}
?>
