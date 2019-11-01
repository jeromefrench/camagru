<?php require '../app/account.php';?>
<?php require '../vue/header.php';?>
<?php
if (isset($_SESSION['logon']) && $_SESSION['logon'] == false)
{
	echo "<h1>Please register before use</h1>";
	exit;
}
?>

<?php include '../vue/my_galery.php'?>

<script type="text/javascript" >
	var login = '<?php echo $login; ?>';
</script>

<script src="my_galery_script.js"></script>
<?php require '../vue/footer.php'; ?>
