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
echo $test1 = str_replace(' ', '+', $test1);
$test1 = base64_decode($test1);
$fileName = 'photo1.png';
file_put_contents($fileName, $test1);

?>

