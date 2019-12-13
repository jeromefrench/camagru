<?php
require_once '../app/bdd_functions.php';

$photo_name = $_POST['file2'];
$login = $_POST['login'];

$data = serialize($_POST);
/* echo $data; */

<<<<<<< HEAD
$conn = connection_bdd();
=======
$conn = connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
$user_id = get_user_id($conn, $login);


insert_picture($conn, $photo_name, "time", $user_id);



file_put_contents("bebechar", $data);

?>
