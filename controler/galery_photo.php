<?php require '../vue/header.php';  ?>
<?php require_once '../app/bdd_functions.php';?>
<?php
$conn = connection_bdd();
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
$conn = connection_bdd();
$commentaires = get_the_commentaires($conn, $match_route->_id);

foreach ($commentaires as $commentaire)
{
	echo '<p class="commentaire">';
	/* echo $commentaire['id_user']; */
	echo $login = get_login_user($conn, $commentaire['id_user']).":</br>";
	echo $commentaire['commentaire']."</br>";
	echo '</p>';
}
?>

	<p id="comment">
	<input type="hidden" name="id_photo" value="<?= $match_route->_id;?>">
<div class="to_center" >
	<input id="comment_input" type="text" name="comment"></br>
	<input type="submit" name="comment-submit" value="Publier commentaire">
</div>
	</p>
</form>
</div>


<?php require '../vue/footer.php'; ?>
