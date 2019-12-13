<div class="columns">
	<div class="column  is-2">
	</div>
	<div class="column  is-8     ">
		<form method="post" action="/galery/photo/<?= $match_route->_id;?>" >
			<figure class="image is-4by3">
				<img src="/<?= $photo['name'];?>"/>
			</figure>
		<div class="columns">
			<div class="column">
				<div class="container"   style="margin-top:20px;">
					<div class="field  is-grouped ">
						<div class="control">
							<label class="label"><?= $number_of_like; ?> Likes</label>
						</div>
						<div class="control">
							<input class="button is-link"  type="submit" name="like-submit" value="I like-it !">
						</div>
					</div>
				</div>
			</div>
			<div class="column  is-one-fifth ">
				<?php if($id_login == $photo['id_user'] ) { ?>
				<div class="container"  style="margin-top:20px;">
					<div class="field">
						<div class="control">
							<input class="button is-link" type="submit" name="submit-sup" value="supprimer">
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="content"   style="margin-top:20px;">
			<?php foreach ($commentaires as $commentaire) {
				$login_comment = get_login_user($conn, $commentaire['id_user'])
			?>
			<p>
				<strong><?= $login_comment ;?>:</strong></br>
				<?= $commentaire['commentaire'] ;?>
			</p>
			<?php } ?>
		</div>
		<textarea class="textarea" name="comment" placeholder="Ajouter un commentaire"></textarea>
			<div class="container"   style="margin-top:20px;">
				<div class="field">
					<div class="control">
						<input class="button is-link" type="submit" name="comment-submit" value="Publier commentaire">
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="column  is-2">
	</div>
</div>
