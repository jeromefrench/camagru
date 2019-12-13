<?php
if ($_POST['type'] == "webcam")
{
	$img = $_POST['file'];
	$test1 = $img;
	$test1 = str_replace('data:image/png;base64,', '', $test1);
	$test1 = str_replace(' ', '+', $test1);
	$test1 = base64_decode($test1);
	$fileName = 'photo1.png';
	file_put_contents($fileName, $test1);
	$image_1 = imagecreatefrompng('photo1.png');
}
else
{
	$img = $_POST['file'];
	$test1 = $img;
	$test1 = "../public".$test1;
	$image_1 = imagecreatefrompng($test1);
}
$filter = $_POST['filter'];
$image_2 = imagecreatefrompng($filter);
imagealphablending($image_2, true);
imagesavealpha($image_2, true);
imagecopy($image_1, $image_2, 0, 0, 0, 0, 640, 480);
$number = rand(0, 50000);
$string = "image".$number.".png";
imagepng($image_1, "usr_photo/".$string);
<<<<<<< HEAD
echo "usr_photo/".$string;  //NE PAS SUP
=======
echo "usr_photo/".$string;
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
?>
