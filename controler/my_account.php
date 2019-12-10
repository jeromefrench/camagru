<?php

if ($method == "GET"){
	require_once '../app/bdd_functions.php';
	$conn = connection_bdd();
	$mail = get_mail_user($conn, $login);
	$selected = get_notification($conn, $login);

	require '../vue/header.php';
	require '../vue/my_account.php';
	require '../vue/footer.php';
}else if ($method == "POST"){

	require_once '../app/bdd_functions.php';
	$login = $_SESSION['login'];

	$conn = connection_bdd();
	if (isset($_POST['submit']) && $_POST['submit'] == "I change my login") {
		$new_login = htmlspecialchars($_POST['login']);
		if (is_login_exist($conn, $new_login)) {
			header("Location: ".$_SERVER['HTTP_REFERER']."");
			exit;
		}
		update_login($conn, $login, $new_login);
		$_SESSION['login'] = $new_login;
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit;
	} else if (isset($_POST['submit']) && $_POST['submit'] == "I change my email adress") {
		$new_mail = htmlspecialchars($_POST['mail']);
		update_mail($conn, $login, $new_mail);
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit;
	} else if (isset($_POST['submit']) && $_POST['submit'] == "I change my password") {
		$new_passwd1 = htmlspecialchars($_POST['passwd1']);
		$new_passwd2 = htmlspecialchars($_POST['passwd2']);
		if (($new_passwd2 != $new_passwd1) || $new_passwd1 === "" ) {
			header("Location: ".$_SERVER['HTTP_REFERER']."");
			exit;
		} else {
			$passwd = hash("sha256", $new_passwd1);
			update_passwd($conn, $login, $passwd);
		}
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit;
	} else if (isset($_POST['submit']) && $_POST['submit'] == "I change notification") {
		if ($_POST['notification'] == '1'){
			$notification = "1";
		} else{
			$notification = "0";
		}
		update_notification($conn, $login, $notification);
		header("Location: ".$_SERVER['HTTP_REFERER']."");
	} else {
		header("Location: ".$_SERVER['HTTP_REFERER']."");
	}
}
else {
	echo "404 error";
} ?>


