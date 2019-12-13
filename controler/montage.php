<?php

if($method == "GET"){
	$_SESSION['answer']['uploadPic'] = false;

	require $root.'/vue/header.php';
	require $root.'/vue/montage.php';
	require $root.'/vue/footer.php';
}
else if ($method == "POST"){
	if (isset($_FILES['myFile'])) {
		if (file_exists($root.'/public/photo_upload/' . $login)) {
			echo unlink($root.'/public/photo_upload/' . $login);
		}
    	move_uploaded_file($_FILES['myFile']['tmp_name'], $root.'/public/photo_upload/' . $login);
		$_SESSION['answer']['uploadPic'] = true;
		header('Location: '.$fullDomain.'/montage');
	}
}
else {
	echo "404 error";
}

?>

