<?php
require_once 'Route.class.php';
require_once 'Router.class.php';

$uri = $_SERVER['REQUEST_URI'];
$router = new Router($uri);


$router->map('GET','', "home", "Home"); //methode, path, target name
$router->map('GET','/', "home", "Home");
$router->map('GET','/home', "home", "Home");
$router->map('GET','/contact-us', "contact", "Contact");
$router->map('GET','/sign-up', "sign_up", "Sign-Up");
$router->map('GET','/sign-in', "sign_in", "Sign-In");
$router->map('GET','/my-galery', "my_galery", "My galery");
$router->map('GET','/my-account', "my_account", "My account");
$router->map('GET','/sign-out', "sign_out", "Sign-out");
/* $router->map('GET','/my-galery/[i:id]', "galery"); //methode, path, target */



$match_route = $router->run();
if ($match_route != false)
{
	if (is_callable($match_route->_target))
		call_user_func($match_route->_target);
	else
	{
		require 'header.php';
		require "{$match_route->_target}.php";
		require 'footer.php';
	}
}
else
{
	require 'header.php';
	echo "404 error";
	require 'footer.php';
}

include 'footer.html';
?>
