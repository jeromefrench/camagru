<?php
session_start();
require_once '../app/bdd_functions.php';

$login = $match_route->_slug;
$numero_unique = $match_route->_id;
$conn = connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
$data = get_user_confirmation($conn, $numero_unique);

if (isset($data[0]))
	$data = $data[0];

var_dump($data);
echo "</br>";
var_dump($login);


if ($data === false)
{
	header('Location: http://localhost:8080/');
}
else if ($data['login'] == $login )
{
	$user = [];
	$user['login'] = $data['login'];
	$user['mail'] = $data['mail'];
	$user['passwd'] = $data['passwd'];
	add_new_user($conn, $user);
	$_SESSION['logon'] = true;
	$_SESSION['login'] = $login;
	header('Location: http://localhost:8080/my-galery');
}
else
{
	header('Location: http://localhost:8080/');
}
?>
