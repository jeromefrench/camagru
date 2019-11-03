
<?php require '../vue/header.php';?>
<?php require '../app/restricted_to_logon.php';?>


<?php include '../vue/my_galery.php'?>

<script type="text/javascript" >
	var login = '<?php echo $login; ?>';
</script>

<script src="my_galery_script.js"></script>
<?php require '../vue/footer.php'; ?>
