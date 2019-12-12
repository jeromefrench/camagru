
<h1 class="title">Ma page</h1>






























<?php foreach ($photos as $photo) { ?>
	<a href="/galery/photo/<?= $photo['id'];?>"><img src="/<?= $photo['name']?>"/></a>
<?php } ?>
















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
