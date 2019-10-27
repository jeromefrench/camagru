<?php
require_once 'Route.class.php';
require_once 'Router.class.php';
?>

<?php

/* Router::$verbos = true; */
/* Route::$verbos = true; */


$uri = $_SERVER['REQUEST_URI'];
$router = new Router($uri);

$router->map('GET','', "home", "Home"); //methode, path, target
$router->map('GET','/', "home", "Home"); //methode, path, target
$router->map('GET','/home', "home", "Home"); //methode, path, target
$router->map('GET','/contact-us', "contact", "Contact"); //methode, path, target, name
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
	echo "404 error";
}


?>








<?php
include 'footer.html';
?>
