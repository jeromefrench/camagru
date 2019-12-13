<?php

if ($method == "GET"){
	require_once '../app/bdd_functions.php';
	$conn = connection_bdd();
	$photo = get_photo_with_id($conn, $match_route->_id);
	$number_of_like = get_number_of_like($conn, $match_route->_id);
	$commentaires = get_the_commentaires($conn, $match_route->_id);
	$id_login = get_user_id($conn, $_SESSION['login']);
	require '../vue/header.php';
	require '../vue/galery_photo.php';
	require '../vue/footer.php';
}else if ($method == "POST"){
	require_once '../app/bdd_functions.php';
	$conn = connection_bdd();
	//************COMMENT PARSING***********************************************
	if (isset($_POST['comment-submit'])) {
		$id_photo = htmlspecialchars($match_route->_id);
		if (isset($_POST['comment'])){
			$commentaire = htmlspecialchars($_POST['comment']);
		}
		else{
			$_SESSION['answer']['wrong'] = true;
			header('Location: '.$fullDomain.'/galery/photo/'.$id_photo);
			exit;
		}
		if ($commentaire == ""){
			$_SESSION['answer']['information_missing'] = true;
			header('Location: '.$fullDomain.'/galery/photo/'.$id_photo);
			exit;
		}
		$id_user = get_user_id($conn, $_SESSION['login']);
		add_comment($conn, $commentaire, $id_user, $id_photo);
		$_SESSION['answer']['new_comment'] = true;
		header('Location: '.$fullDomain.'/galery/photo/'.$id_photo);
		exit;
	//************LIKE PARSING*************************************************
	} else if (isset($_POST['like-submit'])) {
		$id_user = get_user_id($conn, $_SESSION['login']);
		$id_photo = htmlspecialchars($match_route->_id);
		add_like($conn, $id_user, $id_photo);
		$_SESSION['answer']['new_like'] = true;
		header('Location: '.$fullDomain.'/galery/photo/'.$id_photo);
		exit;
	//************DELETE PARSING***********************************************
	} else if (isset($_POST['submit-sup'])) {
		$id_photo = htmlspecialchars($match_route->_id);
		$photo = get_photo_with_id($conn, $match_route->_id);
		sup_photo($conn, $id_photo);
		unlink($photo['name']);
		$_SESSION['answer']['del_pic'] = true;
		header('Location: '.$fullDomain.'/my-galery');
	}
	else {
		header('Location: '.$fullDomain.'/my-galery');
		exit;
	}
}
else{
	echo "404 error";
}
?>
