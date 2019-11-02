<?php require '../vue/header.php';  ?>
<?php require_once '../app/bdd_functions.php';?>


<?php
$conn = connection_bdd();
$photo = get_photo_with_id($conn, $match_route->_id);
?>

<div id="photo">
<img src="/<?= $photo['name'];?>"/>
</div>


<form method="post" action="/photo_like_comment_traitement.php">
	<p id="comment">
	<input type="hidden" name="id_photo" value="<?= $match_route->_id;?>">
	<input type="text" name="comment">
	<input type="submit" name="comment-submit" value="Publier commentaire">
	</p>

	<p id="like">
	<input type="submit" name="like-submit" value="I like-it !">
	</p>

</form>

<?php
$conn = connection_bdd();
//on affiche les commentaire
$commentaires = get_the_commentaires($conn, $match_route->_id);
foreach ($commentaires as $commentaire)
{
	echo $commentaire['commentaire']."</br>";
}


//on affiche le nombre de like
echo "le nombre de like=>".get_number_of_like($conn, $match_route->_id);



?>

<?php require '../vue/footer.php'; ?>
