<?php

if($method == "GET"){
	require_once '../app/bdd_functions.php';
	$conn = connection_bdd();
	$nbr_photo = get_nbr_of_photo($conn);
	$nbr_photo_page = 9;
	$nbr_page = ($nbr_photo / $nbr_photo_page) + 1;

	if (($match_route->_id > 0) && ($match_route->_id <= $nbr_page)){
		$current_page = $match_route->_id;
	}
	else{
		$current_page = 1;
	}

	$photo_first = ($current_page - 1) * $nbr_photo_page;
	$photos = get_photo_for_page($conn, $photo_first, $nbr_photo_page);

	require '../vue/header.php';
	require '../vue/galery.php';
	require '../vue/footer.php';
}
else {
	echo "404 error";
}


?>
