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
	$conn = connection_bdd($root);
	if (is_login_and_mail_match($conn, $login, $mail)) {
		$numero = rand(0, 1000000);
		$domain_name = $fullDomain;
		$page = "changement-password";
		$corp = $domain_name."/".$page."/".$login."/".$numero;
		add_new_password($conn, $login, $numero);
		mail ($mail, 'Email de confirmation changement mp', $corp);
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
