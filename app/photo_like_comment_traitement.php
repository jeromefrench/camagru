<?php
session_start();
require_once 'bdd_functions.php';

if ($_SESSION['logon'] != true)
{
	header('Location: '.$fullDomain.'/sign-in');
	exit;
}

if (isset($_POST['comment-submit'])) {
	//on ajoute le commentaire dans la base de donne
	$conn = connection_bdd();
	echo $commentaire = htmlspecialchars($_POST['comment']);
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
else
{
	header('Location: '.$fullDomain.'/sign-in');
	exit;
}

?>
