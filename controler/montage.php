<?php require '../vue/header.php';?>
<?php require '../app/restricted_to_logon.php';?>

<script type="text/javascript" > var login = '<?php echo $login; ?>'; </script>
<script src="montage_script.js"></script>

<?php include '../vue/my_galery.php'?>

<?php

if (isset($_FILES['myFile'])) {
	var_dump($_FILES['myFile']);
	if (file_exists('../public/photo_upload/' . $login)) {
		echo unlink('../public/photo_upload/' . $login);
	}
    move_uploaded_file($_FILES['myFile']['tmp_name'], '../public/photo_upload/' . $login);
?>
	<script type="text/javascript" >
	var photo = document.querySelector('#photo');
	photo.style.display = "inline";
	photo.src = '/photo_upload/'+login;
	var photo_bool = 1;
	on_creer_le_bouton(photo_bool);
	</script>

<?php } else { ?>

	<script type="text/javascript" >
	var video = document.querySelector('video');
	navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
		video.srcObject = stream;
	var photo_bool = 0;
		on_creer_le_bouton(photo_bool);
}).catch(function(err) {
	console.log(err);
	console.log("lutilisateur a refuser");
	const laod_pic = document.querySelector('#get_file');
	laod_pic.style.display = "inline";
});
</script>

<?php } ?>

<?php require '../vue/footer.php'; ?>
