<?php

if ($method == "GET"){
	require_once '../app/bdd_functions.php';
	$conn = connection_bdd();
	$photo = get_photo_with_id($conn, $match_route->_id);
	$number_of_like = get_number_of_like($conn, $match_route->_id);
	$commentaires = get_the_commentaires($conn, $match_route->_id);
	$id_login = get_user_id($conn, $login);

	require '../vue/header.php';
	require '../vue/galery_photo.php';
	require '../vue/footer.php';

}else if ($method == "POST"){

	require_once '../app/bdd_functions.php';
	if (isset($_POST['comment-submit'])) {
		//on ajoute le commentaire dans la base de donne
		$conn = connection_bdd();
		$commentaire = htmlspecialchars($_POST['comment']);
		$id_user = get_user_id($conn, $_SESSION['login']);
		$id_photo = htmlspecialchars($_POST['id_photo']);
		add_comment($conn, $commentaire, $id_user, $id_photo);
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit;
	} else if (isset($_POST['like-submit'])) {
		//on ajoute le like dans la base de donne
		$conn = connection_bdd();
		$id_user = get_user_id($conn, $_SESSION['login']);
		$id_photo = htmlspecialchars($_POST['id_photo']);
		add_like($conn, $id_user, $id_photo);
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit;
	} else if (isset($_POST['submit-sup'])) {
		$conn = connection_bdd();
		sup_photo($conn, htmlspecialchars($_POST['id_photo']));
		unlink(htmlspecialchars($_POST['name']));
		echo htmlspecialchars($_POST['name']);
		header('Location: '.$fullDomain.'/my-galery');
	}
	else {
		header("Location: ".$_SERVER['HTTP_REFERER']."");
		exit;
	}

}else{
	echo "404 error";
}
?>





