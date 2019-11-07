<?php require '../vue/header.php';?>
<?php require '../app/restricted_to_logon.php';?>
<?php require_once '../app/bdd_functions.php';?>

<h1>My galery</h1>
<div id="galery">


<?php

$conn = connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
$id_user = get_user_id($conn, $_SESSION['login']);
if ($id_user = false)
{
	header('Location: http://localhost:8080/');
	exit;
}
$nbr_photo = get_nbr_photo_for_the_user($conn, $id_user);
$nbr_photo_page = 9;
$nbr_page = ($nbr_photo / $nbr_photo_page) + 1;
if (($match_route->_id > 0) && ($match_route->_id <= $nbr_page))
	$current_page = $match_route->_id;
else
	$current_page = 1;
$photo_first = ($current_page - 1) * $nbr_photo_page;
$photos = get_photo_for_page_for_user($conn, $photo_first, $nbr_photo_page, $id_user);

if ($photos == null || $photos == false)
	header('Location: http://localhost:8080/home');

foreach ($photos as $photo) { ?>
	<a href="/galery/photo/<?= $photo['id'];?>"><img src="/<?= $photo['name']?>"/></a>
<?php } ?>

</div>

<div id="pagination">
<ul>
<?php		if (($current_page - 1) > 0) {?>
				<li><a href="/my-galery/<?php echo $current_page - 1;?>">Precedent</li>
<?php			}	?>
 	<li class="current_page"><?php echo  $current_page;?></li>
<?php
if (($current_page + 1) <= $nbr_page)
	echo '<li><a href="/my-galery/'.($current_page + 1).'">Suivant</a></li>';
?>
</ul>
</div>

<?php require '../vue/footer.php'; ?>
