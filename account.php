<?php
session_start();
if (isset($_SESSION['logon']) && $_SESSION['logon'] == true)
{
	$auth = true;
	$login = $_SESSION['login'];
}
else
{
	$auth = false;
	$login = null;
}
if ($auth === true)
{
?>
	<div id="login">
	<p><a href="/my-account">My account</a></br>
	<a href="/sign-out">Log out</a></p>
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
