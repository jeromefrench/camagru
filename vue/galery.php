
<h1 class="title">Galery</h1>

<div class="columns">
	<div class="column  is-2">
	</div>
	<div class="column  is-8     ">
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
	</div>
</div>

<nav class="pagination is-medium  is-centered" role="navigation" aria-label="pagination">

  <ul class="pagination-list">
<?php if (($current_page - 1) > 0) {
echo 	'<li><a   class="pagination-previous     is-centered    "     href="/galery/'.($current_page - 1).'" >Precedent</a></li>'; }  ?>

<li   class="pagination-link is-current"     class="current_page"><?= $current_page ;?></li>

<?php if (($current_page + 1) <= $nbr_page){
echo	'<li><a   class="pagination-next   is-centered    "    href="/galery/'.($current_page + 1).'">Suivant</a></li>'; }  ?>

  </ul>

</nav>
