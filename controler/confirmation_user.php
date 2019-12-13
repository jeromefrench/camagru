<?php
<<<<<<< HEAD

if($method == "GET"){
	require_once '../app/bdd_functions.php';

	$login = htmlspecialchars($match_route->_slug);
	$numero_unique = htmlspecialchars($match_route->_id);

	$conn = connection_bdd();
	$data = get_user_confirmation($conn, $numero_unique);

	if (isset($data[0])){
		$data = $data[0];
	}
	else{
		$_SESSION['answer']['false_link'] = true;
		header('Location: '.$fullDomain);
		exit;
	}

	if ($data === false) {
		$_SESSION['answer']['false_link'] = true;
		header('Location: '.$fullDomain);
		exit;
	} else if (isset($data['login']) && $data['login'] == $login ) {
		$user = [];
		$user['login'] = $data['login'];
		$user['mail'] = $data['mail'];
		$user['passwd'] = $data['passwd'];
		add_new_user($conn, $user);
		$_SESSION['logon'] = true;
		$_SESSION['login'] = $login;
		$_SESSION['answer']['connexion_sucessfull'] = true;
		header('Location: '.$fullDomain);
		exit;
	}
	else {
		$_SESSION['answer']['false_link'] = true;
		header('Location: '.$fullDomain);
		exit;
	}
}
else {
	echo "404 error";
}

=======
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
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
?>
