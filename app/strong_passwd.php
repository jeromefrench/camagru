<?php


function isPasswdStrong($password){
	$error = null;
	if( strlen($password ) < 8 ) {
		$error .= "Password too short!  \\n";
	}
	if( strlen($password ) > 20 ) {
		$error .= "Password too long!  \\n";
	}
	if( !preg_match("#[0-9]+#", $password ) ) {
		$error .= "Password must include at least one number!  \\n";
	}
	if( !preg_match("#[a-z]+#", $password ) ) {
		$error .= "Password must include at least one letter!  \\n";
	}
	if( !preg_match("#[A-Z]+#", $password ) ) {
		$error .= "Password must include at least one CAPS!  \\n";
	}
	if( !preg_match("#\W+#", $password ) ) {
		$error .= "Password must include at least one symbol!  \\n";
	}
	if($error){
		return ($error);
	} else {
		return (true);
	}
}

?>
