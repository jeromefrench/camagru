
<h1>Galery Page</h1>
<div id="galery">
	<?php foreach ($photos as $photo) {
	echo '<a href="/galery/photo/'.$photo["id"].'"><img src="/'.$photo["name"].'"/></a>';
	}?>
</div>

<div id="pagination">
	<ul>
			<?php if (($current_page - 1) > 0) {
			echo 	'<li><a href="/galery/'.($current_page - 1).'" >Precedent</a></li>'; }?>
					<li class="current_page"><?= $current_page ;?></li>
			<?php if (($current_page + 1) <= $nbr_page){
			echo	'<li><a href="/galery/'.($current_page + 1).'">Suivant</a></li>'; ?>
</ul>
</div>
