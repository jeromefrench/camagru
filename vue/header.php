<html>
	<head>
		<meta charset="utf-8"/>
		<title>Camagru - <?php if ($match_route->_name != null) echo $match_route->_name; ?></title>
		<link rel="stylesheet" href="/style.css"/>
	</head>
	<body>
<div id="header">
		<a id="logo" href="/home"><img src="/img/logo.png" ></a>
		<ul id="nav">
			<li><a href="/galery">Galery</a></li>
			<li><a href="/my-galery">My galery</a></li>
			<li><a href="/montage">Montage</a></li>
		</ul>
<?php
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
	<p> <a href="/sign-up">Sign-Up</a>
	<a href="/sign-in">Sign-In</a></p>
	</div>
<?php
}
?>
</div>
