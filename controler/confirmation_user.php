<?php



if($method == "GET"){
	require_once $root.'/app/bdd_functions.php';

	$login = htmlspecialchars($match_route->_slug);
	$numero_unique = htmlspecialchars($match_route->_id);

	$conn = connection_bdd($root);
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

?>
