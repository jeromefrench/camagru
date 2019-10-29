<?php
require_once 'Route.class.php';
require_once 'Router.class.php';

$uri = $_SERVER['REQUEST_URI'];
$router = new Router($uri);

$router->map('GET','', "home", "Home"); //methode, path, target
$router->map('GET','/', "home", "Home"); //methode, path, target
$router->map('GET','/home', "home", "Home"); //methode, path, target
$router->map('GET','/contact-us', "contact", "Contact"); //methode, path, target, name
$router->map('GET','/sign-up', "sign_up", "Sign-Up"); //methode, path, target, name
$router->map('GET','/sign-in', "sign_in", "Sign-In"); //methode, path, target, name
$router->map('GET','/my-account', "my_account", "My account"); //methode, path, target, name
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
