
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Camagru - <?php if ($match_route->_name != null) echo $match_route->_name; ?></title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>

		<a id="logo" href="/home"><img src="logo.png" ></a>  


		<ul id="header">
			<li><a href="log_in.php">Log in</a></li>
			<li><a href="sign_up.php">Sign up</a></li>
			<li><a href="modify_account.php">Modify account</a></li>
			<li><a href="galery.php">Galery</a></li>
			<li><a href="my_galery.php">My galery</a></li>
			<li><a href="contact-us">Contact</a></li>
		</ul>


		<?php require 'account.php'; ?>
	



