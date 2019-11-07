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
$photos = get_photo_for_page($conn, $photo_first, $nbr_photo_page);

foreach ($photos as $photo)
{
	echo '<a href="/galery/photo/'.$photo["id"].'"><img src="/'.$photo["name"].'"/></a>';
}

echo '</div>';
echo '<div id="pagination">';
echo '<ul>';


if (($current_page - 1) > 0) {
	echo '<li><a href="/galery/'.($current_page - 1).'" >Precedent</a></li>';
}
echo '<li class="current_page">'.$current_page.'</li>';

if (($current_page + 1) <= $nbr_page)
	echo '<li><a href="/galery/'.($current_page + 1).'">Suivant</a></li>';

echo '</ul>';
echo '</div>';

require '../vue/footer.php';
?>
