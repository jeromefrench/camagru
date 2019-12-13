<?php

if($method == "GET"){
	require $root.'/vue/header.php';
	require $root.'/vue/contact.html';
	require $root.'/vue/footer.php';
}
else {
	echo "404 error";
}


?>
