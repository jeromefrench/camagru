<?php require '../vue/header.php';?>
<?php require '../app/restricted_to_logon.php';?>
<?php require_once '../app/bdd_functions.php';?>


<?php
$conn = connection_bdd();
$mail = get_mail_user($conn, $login);
$selected = get_notification($conn, $login);
?>

<h1>My information</h1>
<form class="form" method="post" action="/my_account_traitement.php">

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
