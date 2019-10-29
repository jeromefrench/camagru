<?php
session_start();
if ($_SESSION['logon'] == true)
{
	$auth = true;
	$login = $_SESSION['login'];
}
else
{
	$auth = false;
}
?>


<?php

if ($auth === true)
{
?>
	<div id="login">
	<p> Log on user : <?= $login?>  </br>
	<a href="/my-account">My account</a></p>
	</div>
<?php
}
else
{
?>
	<div id="login">
	<p>
	<a href="/sign-up">Sign-Up</a></p>
	<a href="/sign-in">Sign-In</a></p>
	</div>
<?php
}
?>
