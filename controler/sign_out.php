<?php

if($method == "GET"){
$_SESSION['logon'] = false;
$_SESSION['answer']['log_out_sucessfull'] = true;
header('Location: '.$fullDomain);
}
else {
	echo "404 error";
}
?>
