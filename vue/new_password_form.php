<div class="content has-text-centered">
	<h1 class="title">Nouveau mot de passe</h1>
</div>
<div class="container">
	<div class="columns">
		<div class="column"></div>
		<div class="column is-one-quarter">
			<div class="form">
				<form method="post" action="/changement-password/<?= $log.'/'.$numero ; ;?>" >
					<div class="field">
						<label class="label">Mot de passe</label>
						<div class="control has-icons-left">
							<input class="input" type="password" name="passwd1"  placeholder="Mot de passe">
							<span class="icon is-small is-left">
								<i class="fas fa-lock"></i>
							</span>
						</div>
					</div>
					<div class="field">
						<label class="label">Retaper</label>
						<div class="control has-icons-left">
							<input class="input" type="password" name="passwd2"  placeholder="Mot de passe">
							<span class="icon is-small is-left">
								<i class="fas fa-lock"></i>
							</span>
						</div>
					</div>
					<div class="control">
						<input  class="button is-link"    type="submit" name="submit" value="Changer">
					</div>
				</form>
			</div>
		</div>
		<div class="column"></div>
	</div>
</div>
