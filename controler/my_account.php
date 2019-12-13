<?php

if ($method == "GET"){
	require_once '../app/bdd_functions.php';
	$login = $_SESSION['login'];
	$conn = connection_bdd();
	$mail = get_mail_user($conn, $login);
	$selected = get_notification($conn, $login);
	require '../vue/header.php';
	require '../vue/my_account.php';
	require '../vue/footer.php';
}
else if ($method == "POST"){
	require_once '../app/bdd_functions.php';
	$login = $_SESSION['login'];
	$conn = connection_bdd();
	//************SUBMIT PARSING********************************************************
	if (isset($_POST['submit'])){
		$submit = htmlspecialchars($_POST['submit']);
	}
	else {
		$_SESSION['answer']['wrong'] = true;
		header('Location: '.$fullDomain.'/my-account');
		exit;
	}
	//************LOGIN PARSING*************************************************
	if ($submit == "I change my login") {
		if (isset($_POST['login'])){
			$new_login = htmlspecialchars($_POST['login']);
		}
		else {
			$_SESSION['answer']['wrong'] = true;
			header('Location: '.$fullDomain.'/my-account');
			exit;
		}
		if ($new_login == ""){
			$_SESSION['answer']['information_missing'] = true;
			header('Location: '.$fullDomain.'/my-account');
		}
		if (is_login_exist($conn, $new_login)) {
			$_SESSION['answer']['login_already_taken'] = true;
			header('Location: '.$fullDomain.'/my-account');
			exit;
		}
		update_login($conn, $login, $new_login);
		$_SESSION['login'] = $new_login;
		$_SESSION['answer']['new_login'] = true;
		header('Location: '.$fullDomain.'/my-account');
		exit;
	//************MAIL PARSING**************************************************
	} else if ($submit == "I change my email adress") {
		if (isset($_POST['mail'])){
			$new_mail = htmlspecialchars($_POST['mail']);
		}
		else {
			$_SESSION['answer']['wrong'] = true;
			header('Location: '.$fullDomain.'/my-account');
			exit;
		}
		if ($new_mail == ""){
			$_SESSION['answer']['information_missing'] = true;
			header('Location: '.$fullDomain.'/my-account');
		}
		update_mail($conn, $login, $new_mail);
		$_SESSION['answer']['new_mail'] = true;
		header('Location: '.$fullDomain.'/my-account');
		exit;
	//************PASSWD PARSING************************************************
	} else if ($submit == "I change my password") {
		if (isset($_POST['passwd1']) && isset($_POST['passwd2'])){
			$new_passwd1 = htmlspecialchars($_POST['passwd1']);
			$new_passwd2 = htmlspecialchars($_POST['passwd2']);
		}
		else {
			$_SESSION['answer']['wrong'] = true;
			header('Location: '.$fullDomain.'/my-account');
			exit;
		}
		if (($new_passwd2 != $new_passwd1) || $new_passwd1 === "" ) {
			$_SESSION['answer']['information_missing'] = true;
			header('Location: '.$fullDomain.'/my-account');
			exit;
		 } else {
			$passwd = hash("sha256", $new_passwd1);
			update_passwd($conn, $login, $passwd);
			$_SESSION['answer']['passwd_change'] = true;
			header('Location: '.$fullDomain.'/my-account');
		}
		exit;
		//************NOTIFICATION PARSING************************************************
	} else if ($submit == "I change notification") {
		if (isset($_POST['notification'])){
			$notification = htmlspecialchars($_POST['notification']);
		}
		else {
			$_SESSION['answer']['wrong'] = true;
			header('Location: '.$fullDomain.'/my-account');
			exit;
		}
		if ($notification != "1"){
			$notification = "0";
		}
		update_notification($conn, $login, $notification);
		$_SESSION['answer']['update_notif'] = true;
		header('Location: '.$fullDomain.'/my-account');
		exit;
	}
	else{
			$_SESSION['answer']['wrong'] = true;
			header('Location: '.$fullDomain.'/my-account');
			exit;
	}
}
else {
	echo "404 error";
} ?>
