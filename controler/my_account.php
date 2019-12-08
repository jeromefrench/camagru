<?php

if ($method == "POST"){
	session_start();
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
		//echo $new_mail;
		update_mail($conn, $login, $new_mail);
		//update the adresse email
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit;
	} else if (isset($_POST['submit']) && $_POST['submit'] == "I change my password") {
		$new_passwd1 = htmlspecialchars($_POST['passwd1']);
		//echo $new_passwd1;
		$new_passwd2 = htmlspecialchars($_POST['passwd2']);
		//echo $new_passwd2;
		if (($new_passwd2 != $new_passwd1) || $new_passwd1 === "" ) {
		header("Location: ".$_SERVER['HTTP_REFERER']."");
			exit;
		} else {
			update_passwd($conn, $login, $new_passwd1);
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
}else if ($method == "GET"){

	require '../vue/header.php';
	require_once '../app/bdd_functions.php';

	$conn = connection_bdd();
	$mail = get_mail_user($conn, $login);
	$selected = get_notification($conn, $login);
?>

<h1>My information</h1>
<form class="form" method="post" action="/my-account">

	<p>Login :</br> <input type="text" name="login" value="<?=$login?>"></br>
	<input type="submit" name="submit" value="I change my login"></br>
	</br></p>

	<p>Mail adresse :</br><input type="text" name="mail" value="<?=$mail?>"></br>
	<input type="submit" name="submit" value="I change my email adress"></br>
	</br></p>

	<p>Password :</br><input type="password" name="passwd1"></br>
	Retype your Password :</br><input type="password" name="passwd2"></br>
	<input type="submit" name="submit" value="I change my password"></br>
	</br></p>

	<p>Notification :</br>
	<select name="notification">
    <option value="1" <?php if ($selected == '1') { echo "selected"; } ?> >Get me notified</option>
	<option value="0" <?php if ($selected == '0') { echo "selected"; } ?> >I don't want notifiacation</option>
  	  </select></br>
	<input type="submit" name="submit" value="I change notification"></br>
	</p>

</form>

<?php }else { echo "404 error"; } ?>


