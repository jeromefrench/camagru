<?php


function($password){
	if( strlen($password ) < 8 ) {
		$error .= "Password too short!  ";
	}
	if( strlen($password ) > 20 ) {
		$error .= "Password too long!  ";
	}
	if( !preg_match("#[0-9]+#", $password ) ) {
		$error .= "Password must include at least one number!  ";
	}
	if( !preg_match("#[a-z]+#", $password ) ) {
		$error .= "Password must include at least one letter!  ";
	}
	if( !preg_match("#[A-Z]+#", $password ) ) {
		$error .= "Password must include at least one CAPS!  ";
	}
	if( !preg_match("#\W+#", $password ) ) {
		$error .= "Password must include at least one symbol!  ";
	}
	if($error){
		return ($error);
	} else {
		return (true);
	}
}

?>
