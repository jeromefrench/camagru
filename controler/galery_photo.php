<<<<<<< HEAD
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





=======
<?php require '../vue/header.php';  ?>
<?php require_once '../app/bdd_functions.php';?>
<?php
$conn = connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
$photo = get_photo_with_id($conn, $match_route->_id);
?>

<div id="photo">
<form method="post" action="/photo_like_comment_traitement.php">
<img src="/<?= $photo['name'];?>"/></br>

<?php
//on affiche le nombre de like
echo '<div id="nbr_like">';
echo get_number_of_like($conn, $match_route->_id)." Like";
?>
</div>
<div id="like">
	<input  type="submit" name="like-submit" value="I like-it !">
</div>

<?php
//on affiche les commentaire
$conn = connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
$commentaires = get_the_commentaires($conn, $match_route->_id);

foreach ($commentaires as $commentaire)
{
	echo '<p class="commentaire">';
	/* echo $commentaire['id_user']; */
	echo $login_comment = get_login_user($conn, $commentaire['id_user']).":</br>";
	echo $commentaire['commentaire']."</br>";
	echo '</p>';
}
$id_login = get_user_id($conn, $login);
?>

	<p id="comment">
<?php if($id_login == $photo['id_user'] )
{
	echo '<input type="submit" name="submit-sup" value="supprimer">';
}
?>
	<input type="hidden" name="id_photo" value="<?= $match_route->_id;?>">
	<input type="hidden" name="name" value="<?= $photo['name'];?>">
<div class="to_center" >
	<input id="comment_input" type="text" name="comment"></br>
	<input type="submit" name="comment-submit" value="Publier commentaire">
</div>
	</p>
</form>
</div>


<?php require '../vue/footer.php'; ?>
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
