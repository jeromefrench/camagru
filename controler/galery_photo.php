<?php

if ($method == "GET"){
	$conn = connection_bdd($root);
	$photo = get_photo_with_id($conn, $match_route->_id);
	if ($photo == NULL){
		$_SESSION['answer']['id_invalid'] = true;
		header('Location: '.$fullDomain);
		exit;
	}
	$number_of_like = get_number_of_like($conn, $match_route->_id);
	$commentaires = get_the_commentaires($conn, $match_route->_id);
	$id_login = get_user_id($conn, $_SESSION['login']);
	require $root.'/vue/header.php';
	require $root.'/vue/galery_photo.php';
	require $root.'/vue/footer.php';
}
else if ($method == "POST"){
	$conn = connection_bdd($root);
	$id_photo = htmlspecialchars($match_route->_id);
	$id_user = get_user_id($conn, $_SESSION['login']);
	//************COMMENT PARSING***********************************************
	if (!isset($_POST)){
		$_SESSION['answer']['wrong'] = true;
		header('Location: '.$fullDomain.'/galery/photo/'.$id_photo);
		exit;
	}
	if (isset($_POST['comment-submit'])) {
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
		add_comment($conn, $commentaire, $id_user, $id_photo);
		$selected = get_notification($conn, $login);
		if ($selected) {
			$mail = get_mail_user($conn, $login);
			$corp = "une de vos photos a recue un nouveau commentaire";
			mail ($mail, 'Nouveau commentaire', $corp);
		}
		$_SESSION['answer']['new_comment'] = true;
		header('Location: '.$fullDomain.'/galery/photo/'.$id_photo);
		exit;
	//************LIKE PARSING*************************************************
	} else if (isset($_POST['like-submit'])) {
		add_like($conn, $id_user, $id_photo);
		$_SESSION['answer']['new_like'] = true;
		header('Location: '.$fullDomain.'/galery/photo/'.$id_photo);
		exit;
	//************DELETE PARSING***********************************************
	} else if (isset($_POST['submit-sup'])) {
		$id_login = get_user_id($conn, $_SESSION['login']);
		$photo = get_photo_with_id($conn, $match_route->_id);
		if($id_login == $photo['id_user'] ){
			$photo = get_photo_with_id($conn, $match_route->_id);
			sup_photo($conn, $id_photo);
			unlink("/public/".$photo['name']);
			$_SESSION['answer']['del_pic'] = true;
			header('Location: '.$fullDomain.'/my-galery');
			exit;
		}
		else{
			//la photo vous appartient pas
			header('Location: '.$fullDomain.'/my-galery');
			exit;
		}
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
