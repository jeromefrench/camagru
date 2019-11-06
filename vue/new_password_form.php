
<h1>New password</h1>
<div class="form">
	<form method="post" action="/changement-password" >
		<p>New Password :</br><input type="password" name="passwd1"></p>
		<p>Retype password :</br><input type="password" name="passwd2"></p>
		<input type="hidden" name="login" value="<?= $login;?>">
		<input type="hidden" name="numero" value="<?= $numero;?>">
		<p><input type="submit" name="submit" value="Sign-Up"></p>
	</form>
</div>
