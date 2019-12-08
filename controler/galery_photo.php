<?php
if ($method == "POST"){
	session_start();
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
}else if ($method == "GET"){
	require '../vue/header.php';
	require_once '../app/bdd_functions.php';
	$conn = connection_bdd();
	$photo = get_photo_with_id($conn, $match_route->_id);
	$number_of_like = get_number_of_like($conn, $match_route->_id);
	$commentaires = get_the_commentaires($conn, $match_route->_id);
	$id_login = get_user_id($conn, $login);
?>

<div id="photo">
	<form method="post" action="/galery/photo">
		<img src="/<?= $photo['name'];?>"/></br>
		<div id="nbr_like">
			<?= $number_of_like; ?>Like
		</div>
		<div id="like">
			<input  type="submit" name="like-submit" value="I like-it !">
		</div>
<?php 
	foreach ($commentaires as $commentaire) {
		$login_comment = get_login_user($conn, $commentaire['id_user'])
?>
		<p class="commentaire">
			<?= $login_comment ;?>:</br>
			<?= $commentaire['commentaire'] ;?></br>
		</p>
<?php } ?>
		<p id="comment">
			<?php if($id_login == $photo['id_user'] ) { echo '<input type="submit" name="submit-sup" value="supprimer">'; } ?>
			<input type="hidden" name="id_photo" value="<?= $match_route->_id;?>">
			<input type="hidden" name="name" value="<?= $photo['name'];?>">
			<div class="to_center" >
				<input id="comment_input" type="text" name="comment"></br>
				<input type="submit" name="comment-submit" value="Publier commentaire">
			</div>
		</p>
	</form>
</div>

<?php require '../vue/footer.php';
}else{
	echo "404 error";
}
?>
