<?php
if ($_SESSION['logon'] == false)
{
	echo "Please register before use";
	exit;
}
?>
<h1>My galery</h1>
<div id="my_galery">
	<div id="main">
		<?php include 'pastille.html';?>
		<?php include 'video.html';?>
	</div>
	<?php include 'side.html';?>
</div>


<script type="text/javascript" >
	var login = '<?php echo $login; ?>';
</script>
<script src="my_galery_script.js"></script>

