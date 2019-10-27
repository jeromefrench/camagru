

<div id="login">


<?php


if ($auth === true)
{
	echo 'Log on user :'.$login;
	echo '<a href="/my-account">My account</a>';
}
else
{
	//display sign up link
	echo '<a href="/sign-up">Sign-Up</a>';
}

?>
</div>
