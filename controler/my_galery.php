<?php

if($method == "GET"){

	require_once '../app/bdd_functions.php';

	$conn = connection_bdd();
	$id_user = get_user_id($conn, $_SESSION['login']);
	$nbr_photo = get_nbr_photo_for_the_user($conn, $id_user);
	$nbr_photo_page = 9;
	$nbr_page = ($nbr_photo / $nbr_photo_page) + 1;
	if (($match_route->_id > 0) && ($match_route->_id <= $nbr_page))
		$current_page = $match_route->_id;
	else
		$current_page = 1;
	$photo_first = ($current_page - 1) * $nbr_photo_page;
	$photos = get_photo_for_page_for_user($conn, $photo_first, $nbr_photo_page, $id_user);


	require '../vue/header.php';
	require '../vue/my_galery_personal.php';
	require '../vue/footer.php';

}
else {
	echo "404 error";
}


?>
