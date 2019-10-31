<?php

$file_name = $_POST['file2'];
$login = $_POST['login'];

$data = serialize($_POST);


file_put_contents("bebechar", $data);

?>
