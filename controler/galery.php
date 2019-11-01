
<?php require '../app/account.php'; ?>

<?php require '../vue/header.php';  ?>

<h1>Galery Page</h1>

<div id="galery">

<?php

require_once '../app/bdd_functions.php';
$conn = connection_bdd();
$photos = get_photo($conn);

foreach ($photos as $photo)
{
?>
	<img src="<?= $photo['name']?>"/>
<?php
}
?>

</div>



<?php require '../vue/footer.php'; ?>
