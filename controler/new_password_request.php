<<<<<<< HEAD
<?php

if($method == "GET"){
	require '../vue/header.php';
	require '../vue/new_password_form_requested.html';
	require '../vue/footer.php';
}
else if ($method == "POST"){
	require '../app/bdd_functions.php';


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
		require '../app/send_email_new_passwd.php';
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
=======

<?php require '../vue/header.php';?>
<?php require '../app/bdd_functions.php';?>


<?php
if (!isset($_POST['submit']))
{
	require '../vue/new_password_form_requested.html';
}
else
{
	if ($_POST['login'] == "" || $_POST['mail'] == "")
	{
		echo "<p>Il manque des informations</p>";
		require '../vue/new_password_form_requested.html';
	}
	else
	{
		$login = htmlspecialchars($_POST['login']);
		$mail = htmlspecialchars($_POST['mail']);
		$conn = connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
		is_login_and_mail_match($conn, $login, $mail);
		{
			require '../app/send_email_new_passwd.php';
			echo "<p>Un lien vous a ete envoye</p>";
		}
	}
}
?>

<?php require '../vue/footer.php';?>




>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
