<<<<<<< HEAD
<?php

if($method == "GET"){
	require '../vue/header.php';
	require '../vue/montage.php';
	require '../vue/footer.php';
}
else if ($method == "POST"){

	//si il accepte la webcam on lui envoi le code de la webcam


	//si il refuse la webcam on lui envoi lupload image


	//si il poste une photo on l'enregistre si valide

}
else {
	echo "404 error";
}


//<script type="text/javascript" > var login = 'php echo $login; '; </script>
//<script src="montage_script.js"></script>






/* if (isset($_FILES['myFile'])) { */
/* 	if (file_exists('../public/photo_upload/' . $login)) { */
/* 		echo unlink('../public/photo_upload/' . $login); */
/* 	} */
/*     move_uploaded_file($_FILES['myFile']['tmp_name'], '../public/photo_upload/' . $login); */

	/* <script type="text/javascript" > */
	/* var photo = document.querySelector('#photo'); */
	/* photo.style.display = "inline"; */
	/* photo.src = '/photo_upload/'+login; */
	/* var photo_bool = 1; */
	/* on_creer_le_bouton(photo_bool); */
	/* </script> */

?>

=======
<?php require '../vue/header.php';?>
<?php require '../app/restricted_to_logon.php';?>

<script type="text/javascript" > var login = '<?php echo $login; ?>'; </script>
<script src="montage_script.js"></script>
<?php include '../vue/my_galery.php'?>

<?php

if (isset($_FILES['myFile']))
{
	var_dump($_FILES['myFile']);
	if (file_exists('../public/photo_upload/' . $login))
	{
		echo "ic=";
		echo unlink('../public/photo_upload/' . $login);
	}
    move_uploaded_file($_FILES['myFile']['tmp_name'], '../public/photo_upload/' . $login);
    echo "L'envoi a bien été effectué !";
?>
<?php
?>
	<script type="text/javascript" >
	var photo = document.querySelector('#photo');
	photo.style.display = "inline";
	photo.src = '/photo_upload/'+login;
	var photo_bool = 1;
	on_creer_le_bouton(photo_bool);
	</script>
<?php
}
else
{
?>
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
<?php
}
?>

<?php require '../vue/footer.php'; ?>
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
