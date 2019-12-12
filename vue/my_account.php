
<h1 class="title">Mes informations</h1>


<div class="container">
	<div class="columns">
		<div class="column"></div>
		<div class="column is-one-quarter">
			<div class="form">
				<form method="post" action="/my-account" >


					<div class="field">
						<label class="label">Identifiant</label>
						<div class="control">
							<input class="input" type="text" name="login"  placeholder="<?=$login?>">
						</div>
					</div>
					<div class="control">
						<input class="button is-link" type="submit" name="submit" value="I change my login"></br>
					</div>


					<div class="field">
						<label class="label">Adresse mail</label>
						<div class="control">
							<input class="input" type="text" name="mail"  placeholder="<?=$mail?>">
						</div>
					</div>

					<div class="control">
						<input class="button is-link"type="submit" name="submit" value="I change my email adress"></br>
					</div>

					<div class="field">
						<label class="label">Mot de passe</label>
						<div class="control">
							<input class="input" type="password" name="passwd1"  placeholder="*****">
						</div>
					</div>
					<div class="field">
						<label class="label">Retaper le mot de passe</label>
						<div class="control">
							<input class="input" type="password" name="passwd2"  placeholder="*****">
						</div>
					</div>
					<div class="control">
						<input class="button is-link" type="submit" name="submit" value="I change my password"></br>
					</div>


					<div class="field">
							<label class="label">Notification</label>
						<div class="control">
							<div class="select">
								<select  name="notification" >
									<option value="1" <?php if ($selected == '1') { echo "selected"; } ?> > Je veux recevoir des notification (mail) </option>
									<option value="0" <?php if ($selected == '0') { echo "selected"; } ?> >Je ne veux pas recevoir de notification (mail)</option>
								</select>
							</div>
						</div>
					</div>
					<div class="control">
						<input  class="button is-link"  type="submit" name="submit" value="I change notification"></br>
					</div>
				</form>
			</div>
		</div>
		<div class="column"></div>
	</div>
</div>
