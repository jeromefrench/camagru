<?php
session_start();


if (!isset($_POST)){
	echo "error1";
	exit;
}

if (!(isset($_POST['type']) && isset($_POST['file']) && isset($_POST['filter']))){
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
	$test1 = $file;
	$test1 = str_replace('data:image/png;base64,', '', $test1);
	$test1 = str_replace(' ', '+', $test1);
	$test1 = base64_decode($test1);
	if ($test1 === false){
		echo "error5";
		exit;
	}
	$fileName = 'photo1.png';
	$ans = file_put_contents($fileName, $test1);
	if ($ans === false){
		echo "error";
		exit;
	}
	$image_1 = imagecreatefrompng('photo1.png');
	if ($image_1 === false){
		echo "error6";
		exit;
	}
	unlink('photo1.png');
}
else
{
	$test1 = $file;
	$test1 = "../public".$test1;
	$image_1 = imagecreatefrompng($test1);
	if ($image_1 === false){
		echo "error7";
		exit;
	}
}

$image_2 = imagecreatefrompng("./img/".$filter);
if ($image_2 === false){
	echo "error8";
	exit;
}
$ans = imagealphablending($image_2, true);
if ($ans === false){
	echo "error9";
	exit;
}

$ans = imagesavealpha($image_2, true);
if ($ans === false){
	echo "error10";
	exit;
}

$ans = imagecopy($image_1, $image_2, 0, 0, 0, 0, 640, 480);
if ($ans === false){
	echo "error11";
	exit;
}

$number = rand(0, 50000);
$string = "image".$number.".png";
$ans = imagepng($image_1, "usr_photo/".$string);
if ($ans === false){
	echo "error12";
	exit;
}

$photo_name = "usr_photo/".$string;

//on save
require_once '../app/bdd_functions.php';
$conn = connection_bdd();
$user_id = get_user_id($conn, $_SESSION['login']);
insert_picture($conn, $photo_name, "time", $user_id);


echo "sucesspic".$photo_name;


?>
