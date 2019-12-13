<?php
<<<<<<< HEAD
session_start();
$domainName = "https://localhost";
$port = ":8443";
$fullDomain = $domainName.$port;
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER["REQUEST_METHOD"];




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
//************answer*******************************************************


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
require_once '../app/Route.class.php';
require_once '../app/Router.class.php';
$router = new Router($uri);
$router->map('GET','', "galery", "Home"); //methode, path, target name
$router->map('GET','/', "galery", "Home");
=======
$uri = $_SERVER['REQUEST_URI'];

if ($uri == "/sign_up_traitement.php")
{
	/* require "../app/sign_up_traitement.php"; */
}
else if ($uri == "/sign_in_traitement.php")
{
	require "../app/sign_in_traitement.php";
}
else if ($uri == "/sign-out")
{
	require '../app/sign_out.php';
}
else if ($uri == "/photo_like_comment_traitement.php")
{
	require '../app/photo_like_comment_traitement.php';
}
else if ($uri == "/my_account_traitement.php")
{
	require '../app/my_account_traitement.php';
}
else if ($uri == "/setup.php")
{
	require '../config/setup.php';
}


require_once '../app/Route.class.php';
require_once '../app/Router.class.php';

$uri = $_SERVER['REQUEST_URI'];
$router = new Router($uri);


$router->map('GET','', "galery", "Home"); //methode, path, target name
$router->map('GET','/', "galery", "Home");
$router->map('GET','/home', "galery", "Home");
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
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
<<<<<<< HEAD
$router->map('GET','/sign-out', "sign_out", "Sign Out");
$match_route = $router->run();
if ($match_route != false) {
		require "../controler/{$match_route->_target}.php";
} else {
	echo "404 error";
}
=======

/* $router->map('GET','/my-galery/[i:id]', "galery"); //methode, path, target */

$match_route = $router->run();

if ($match_route != false)
{
		require "../controler/{$match_route->_target}.php";
}
else
{
	echo "404 error";
}

>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
?>
