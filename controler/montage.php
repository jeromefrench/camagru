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

