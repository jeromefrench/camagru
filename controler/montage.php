<?php

if($method == "GET"){
	$_SESSION['answer']['uploadPic'] = false;

	require '../vue/header.php';
	require '../vue/montage.php';
	require '../vue/footer.php';
}
else if ($method == "POST"){
	if (isset($_FILES['myFile'])) {
		if (file_exists('../public/photo_upload/' . $login)) {
			echo unlink('../public/photo_upload/' . $login);
		}
    	move_uploaded_file($_FILES['myFile']['tmp_name'], '../public/photo_upload/' . $login);
		$_SESSION['answer']['uploadPic'] = true;
		header('Location: '.$fullDomain.'/montage');
	}
}
else {
	echo "404 error";
}

?>

