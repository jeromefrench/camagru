<?php

if (!(isset($_POST) && isset($_POST['type']) && isset($_POST['file']) && isset($_POST['filter']))){
	echo "error2";
	exit;
}

$type = $_POST['type'];
$file = $_POST['file'];
$filter = $_POST['filter'];

if ($type !== "webcam" && $type !== "photo"){
	echo "error3";
	exit;
}

if ($filter !== "coeur.png" && $filter !== "spider.png" && $filter !== "wings.png" && $filter !== "cadre.png"){
	echo "error4";
	exit;
}

if ($type == "webcam")
{
	$webCamRaw = str_replace('data:image/png;base64,', '', $file);
	$webCamRaw = str_replace(' ', '+', $webCamRaw);
	$webCamRaw = base64_decode($webCamRaw);
	if ($webCamRaw === false){
		echo "error5";
		exit;
	}
	$fileName = $root.'/public/photo_upload/cam'.rand(0, 100).'.png';
	$ans = file_put_contents($fileName, $webCamRaw);
	if ($ans === false){
		echo "error6";
		exit;
	}
	$image_1 = imagecreatefrompng($fileName);
	if ($image_1 === false){
		echo "error7";
		exit;
	}
	unlink($fileName);
}
else
{
	$picPath = $root."/public/photo_upload/".$login;
	$image_1 = imagecreatefrompng($picPath);
	if ($image_1 === false){
		echo "error8";
		exit;
	}
}

$image_2 = imagecreatefrompng($root."/public/img/".$filter);
if ($image_2 === false){
	echo "error9";
	exit;
}
$ans = imagealphablending($image_2, true);
if ($ans === false){
	echo "error10";
	exit;
}

$ans = imagesavealpha($image_2, true);
if ($ans === false){
	echo "error11";
	exit;
}

$ans = imagecopy($image_1, $image_2, 0, 0, 0, 0, 640, 480);
if ($ans === false){
	echo "error12";
	exit;
}

$number = rand(0, 50000);
$string = "image".$number.".png";
$ans = imagepng($image_1, $root."/public/usr_photo/".$string);
if ($ans === false){
	echo "error13";
	exit;
}

$photo_name = "usr_photo/".$string;

//on save
require_once $root.'/app/bdd_functions.php';
$conn = connection_bdd($root);
$user_id = get_user_id($conn, $_SESSION['login']);
insert_picture($conn, $photo_name, "time", $user_id);


echo "sucesspic".$photo_name;


?>
