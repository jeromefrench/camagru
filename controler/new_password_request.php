<?php

if($method == "GET"){
	require '../vue/header.php';
	require '../vue/new_password_form_requested.html';
	require '../vue/footer.php';
}
else if ($method == "POST"){
	require '../app/bdd_functions.php';
	if ($_POST['login'] == "" || $_POST['mail'] == "") {
		$_SESSION['answer']['information_missing'] = true;
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit;
	}
	else {
		$login = htmlspecialchars($_POST['login']);
		$mail = htmlspecialchars($_POST['mail']);
		$conn = connection_bdd();
		if (is_login_and_mail_match($conn, $login, $mail)) {
			require '../app/send_email_new_passwd.php';
			$_SESSION['answer']['send_link'] = true;
			header("Location: ".$_SERVER['HTTP_REFERER']."");
			exit;
		}
	}
}
else {
	echo "404 error";
}

?>
