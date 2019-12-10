
<?php

require '../vue/header.php';
require '../app/bdd_functions.php';


if (!isset($_POST['submit'])) {
	require '../vue/new_password_form_requested.html';
}
else {
	if ($_POST['login'] == "" || $_POST['mail'] == "") {
		echo "<p>Il manque des informations</p>";
		require '../vue/new_password_form_requested.html';
	}
	else {
		$login = htmlspecialchars($_POST['login']);
		$mail = htmlspecialchars($_POST['mail']);
		$conn = connection_bdd();
		if (is_login_and_mail_match($conn, $login, $mail)) {
			require '../app/send_email_new_passwd.php';
			echo "<p>Un lien vous a ete envoye</p>";
		}
	}
}

require '../vue/footer.php';

?>
