<?php


/* echo $_REQUEST['q']; */

/* var_dump($_POST); */
/* print_r($_FILES); */



/* var_dump($_FILES['file']); */




$img = $_POST['file'];
echo PHP_EOL."</br>";
echo PHP_EOL."</br>";
echo PHP_EOL."</br>";
echo PHP_EOL."</br>";
echo PHP_EOL."</br>";
echo PHP_EOL."</br>";


$test1 = $img;
$test1 = str_replace('data:image/png;base64,', '', $test1);
$test1 = str_replace(' ', '+', $test1);
$test1 = base64_decode($test1);
$fileName = 'photo1.png';
file_put_contents($fileName, $test1);



echo "hello toi aacc";

imagepng($dest, "my_new_image.png");

$image_1 = imagecreatefrompng('photo1.png');
$image_2 = imagecreatefrompng('img/wings_copy.png');

imagealphablending($image_2, true);
imagesavealpha($image_2, true);
imagecopy($image_1, $image_2, 0, 0, 0, 0, 640, 480);
imagepng($image_1, 'image_3.png');


?>

