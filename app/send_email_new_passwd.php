<?php
$numero = rand(0, 1000000);
<<<<<<< HEAD
$domain_name = $fullDomain;
$page = "changement-password";
$corp = $domain_name."/".$page."/".$login."/".$numero;
$conn = connection_bdd();
add_new_password($conn, $login, $numero);
ini_set('display_errors', 1);
error_reporting(-1);
$mail = "jerome.chardin@live.fr";
=======
/* $domain_name = "https://37.187.109.62"; */
$domain_name = "http://localhost:8080";
$page = "changement-password";
$corp = $domain_name."/".$page."/".$login."/".$numero;
$conn = connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
add_new_password($conn, $login, $numero);
ini_set('display_errors', 1);
error_reporting(-1);
/* $mail = "jerome.chardin@live.fr"; */
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
mail (''.$mail.'', 'Email de confirmation changement mp', ''.$corp.'') || print_r(error_get_last());
?>
