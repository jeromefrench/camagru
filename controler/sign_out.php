<?php

if($method == "GET"){
	$_SESSION['logon'] = false;
	unset($_SESSION['login']);
	$_SESSION['answer']['log_out_sucessfull'] = true;
	header('Location: '.$fullDomain);
	exit;
}
else {
	echo "404 error";
}
?>
