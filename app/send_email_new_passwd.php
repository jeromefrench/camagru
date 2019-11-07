<?php
$numero = rand(0, 1000000);
$domain_name = "https://37.187.109.62";
$page = "changement-password";
$corp = $domain_name."/".$page."/".$login."/".$numero;
$conn = connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
add_new_password($conn, $login, $numero);
ini_set('display_errors', 1);
error_reporting(-1);
$mail = "jerome.chardin@live.fr";
mail (''.$mail.'', 'Email de confirmation changement mp', ''.$corp.'') || print_r(error_get_last());
?>
