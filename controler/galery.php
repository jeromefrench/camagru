
<?php require '../vue/header.php';  ?>
<?php require_once '../app/bdd_functions.php';?>


<h1>Galery Page</h1>
<div id="galery">

<?php
$conn = connection_bdd();
$nbr_photo = get_nbr_of_photo($conn);
$nbr_photo_page = 9;
$nbr_page = ($nbr_photo / $nbr_photo_page) + 1;


if (($match_route->_id > 0) && ($match_route->_id <= $nbr_page))
	$current_page = $match_route->_id;
else
	$current_page = 1;

$photo_first = ($current_page - 1) * $nbr_photo_page;
$photo_last = $photo_first + $nbr_photo_page;
?>

<?php
$conn = connection_bdd();
/* $photos = get_photo($conn); */
$photos = get_photo_for_page($conn, $photo_first, $nbr_photo_page);

foreach ($photos as $photo)
{
?>
	<a href="/galery/photo/<?= $photo['id'];?>"><img src="/<?= $photo['name']?>"/></a>
<?php
}
?>

</div>
<ul>


<div id="pagination">
<?php		if (($current_page - 1) > 0) {?>
				<li><a href="/galery/<?php echo $current_page - 1;?>">Precedent</li>
<?php			}	?>
 	<li><?php echo  $current_page;?></li>
<?php

if (($current_page + 1) <= $nbr_page)
{
	echo '<li><a href="/galery/'.($current_page + 1).'">Suivant</a></li>';
}

?>
</ul>
</div>

<?php require '../vue/footer.php'; ?>
