<?php

if($method == "GET"){
	require $root.'/vue/header.php';
	require $root.'/vue/new_password_form_requested.html';
	require $root.'/vue/footer.php';
}
else if ($method == "POST"){
	require $root.'/app/bdd_functions.php';
	if (isset($_POST) && isset($_POST['login']) && isset($_POST['mail'])){
		$login = htmlspecialchars($_POST['login']);
		$mail = htmlspecialchars($_POST['mail']);
	}
	else{
		$_SESSION['answer']['wrong'] = true;
		header('Location: '.$fullDomain.'/new-password-request');
		exit;
	}
	$conn = connection_bdd();
	if (is_login_and_mail_match($conn, $login, $mail)) {
		require $root.'/app/send_email_new_passwd.php';
		$_SESSION['answer']['send_link'] = true;
		header('Location: '.$fullDomain);
		exit;
	}
	else{
		$_SESSION['answer']['login_and_mail_dont_match'] = true;
		header('Location: '.$fullDomain.'/new-password-request');
		exit;
	}
}
else {
	echo "404 error";
}

?>
