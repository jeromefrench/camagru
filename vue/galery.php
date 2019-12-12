
<h1 class="title">Galery</h1>

<div class="columns">
	<div class="column  is-2">
		First column
	</div>
	<div class="column  is-8     ">
		First column
		<div class="columns  is-multiline     ">
			<?php foreach($photos as $photo) {  ?>
			<div class="column  is-one-third">
				<div class="card">
					<div class="card-image">
						<figure class="image is-4by3">
							<a href="/galery/photo/<?php echo $photo['id'] ;?>"><img src="/<?php echo $photo['name'] ;?>"   alt="Placeholder image"    /></a>
						</figure>
					</div>
				</div>
			</div>
			<?php  }  ?>
		</div>
	</div>
	<div class="column  is-2">
		Fourth column
	</div>
</div>





<div id="pagination">
<ul>
<?php if (($current_page - 1) > 0) {
echo 	'<li><a href="/galery/'.($current_page - 1).'" >Precedent</a></li>'; }  ?>
<li class="current_page"><?= $current_page ;?></li>
<?php if (($current_page + 1) <= $nbr_page){
echo	'<li><a href="/galery/'.($current_page + 1).'">Suivant</a></li>'; }  ?>
</ul>
</div>
