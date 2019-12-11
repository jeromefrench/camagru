
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
			<div class="to_center" >
				<input id="comment_input" type="text" name="comment"></br>
				<input type="submit" name="comment-submit" value="Publier commentaire">
			</div>
		</p>
	</form>
</div>
