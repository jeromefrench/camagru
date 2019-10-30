<?php
session_start();

//regarder si le user exit
if ($_POST['login'] === "login")
{
	$_SESSION['logon'] = true;
	$_SESSION['login'] =  "defaut login";
	$_SESSION['mail'] = "defaut mail";
	$_SESSION['passwd'] = "defaut passwd";
	header('Location: http://localhost:8080/');
}
else
{
	header('Location: http://localhost:8080/sign-in');
}

?>
