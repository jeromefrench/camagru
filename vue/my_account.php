
<h1>My information</h1>
<form class="form" method="post" action="/my-account">

	<p>Login :</br> <input type="text" name="login" value="<?=$login?>"></br>
	<input type="submit" name="submit" value="I change my login"></br>
	</br></p>

	<p>Mail adresse :</br><input type="text" name="mail" value="<?=$mail?>"></br>
	<input type="submit" name="submit" value="I change my email adress"></br>
	</br></p>

	<p>Password :</br><input type="password" name="passwd1"></br>
	Retype your Password :</br><input type="password" name="passwd2"></br>
	<input type="submit" name="submit" value="I change my password"></br>
	</br></p>

	<p>Notification :</br>
	<select name="notification">
    <option value="1" <?php if ($selected == '1') { echo "selected"; } ?> >Get me notified</option>
	<option value="0" <?php if ($selected == '0') { echo "selected"; } ?> >I don't want notification</option>
  	  </select></br>
	<input type="submit" name="submit" value="I change notification"></br>
	</p>

</form>
