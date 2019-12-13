<?php
session_start();
$domainName = "https://localhost";
$port = ":8443";
$fullDomain = $domainName.$port;
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER["REQUEST_METHOD"];
$root = dirname(__FILE__);

if (isset($_SESSION['logon']) && $_SESSION['logon'] == true) {
	$auth = true;
	$login = $_SESSION['login'];
}
else {
	$auth = false;
	$login = null;
}

//************answer*******************************************************

if (isset($_SESSION['answer'])){
	$answer = $_SESSION['answer'];
	unset($_SESSION['answer']);
}

//************restricted*******************************************************

$restricted = false;

if ($uri == "/" ||
$uri == "/sign-up" ||
$uri == "/sign-in" ||
$uri == "/new-password-request" ||
$uri == "/galery" ||
preg_match('/^\/galery\/[0-9]+/i', $uri,  $match) == 1 ||
preg_match('/^\/changement-password/i', $uri,  $match) == 1 ||
preg_match('/^\/confirmation\//i', $uri,  $match) == 1 ||
$uri == "/contact-us"){
	$restricted_area = false;
}
else{
	$restricted_area = true;
}


if ($restricted_area == false){
	//pas de probleme
	$uri = $uri;
}
else{
	if (isset($_SESSION['logon']) && $_SESSION['logon'] == true){
		//pas de probleme
		$uri = $uri;
	}
	else{
		//on redirige
		$_SESSION['answer']['restricted'] = true;
		if (isset($_SERVER['HTTP_REFERER'])){
			header("Location: ".$_SERVER['HTTP_REFERER']."");
		}else{
			header('Location: '.$fullDomain);
		}
		$restricted = true;
		exit();
	}
}
if ($restricted == true){
	exit();
}

//************restricted*******************************************************


//faire middleware protection
require_once $root.'/app/Route.class.php';
require_once $root.'/app/Router.class.php';
$router = new Router($uri);
$router->map('GET','', "galery", "Home"); //methode, path, target name
$router->map('GET','/', "galery", "Home");
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
		require $root."/controler/{$match_route->_target}.php";
} else {
	echo "404 error";
}
?>
