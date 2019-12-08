<?php
$domainName = "https://localhost";
$port = ":8443";
$fullDomain = $domainName.$port;
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER["REQUEST_METHOD"];
//faire middleware protection
//require '../app/restricted_to_logon.php';
require_once '../app/Route.class.php';
require_once '../app/Router.class.php';
$router = new Router($uri);
$router->map('GET','', "galery", "Home"); //methode, path, target name
$router->map('GET','/', "galery", "Home");
$router->map('GET','/home', "galery", "Home");
$router->map('GET','/contact-us', "contact", "Contact");
$router->map('GET','/sign-up', "sign_up", "Sign-Up");
$router->map('GET','/sign-in', "sign_in", "Sign-In");
$router->map('GET','/my-galery', "my_galery", "My galery");
$router->map('GET','/my-account', "my_account", "My account");
$router->map('GET','/sign-out', "sign_out", "Sign-out");
$router->map('GET','/galery/photo', "galery_photo", "Galery-photo");
$router->map('GET','/galery', "galery", "Galery");
$router->map('GET','/montage', "montage", "Montage");
$router->map('GET','/confirmation', "confirmation_user", "Confirm Account");
$router->map('GET','/new-password-request', "new_password_request", "New password");
$router->map('GET','/changement-password', "changement_password", "New password");
$router->map('GET','/sign-out', "sign_out", "Sign Out");
$match_route = $router->run();
if ($match_route != false) {
		require "../controler/{$match_route->_target}.php";
} else {
	echo "404 error";
}
?>
