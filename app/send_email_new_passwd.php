<?php
$numero = rand(0, 1000000);
$domain_name = $fullDomain;
$page = "changement-password";
$corp = $domain_name."/".$page."/".$login."/".$numero;
$conn = connection_bdd();
add_new_password($conn, $login, $numero);
ini_set('display_errors', 1);
error_reporting(-1);
$mail = "jerome.chardin@live.fr";
mail (''.$mail.'', 'Email de confirmation changement mp', ''.$corp.'') || print_r(error_get_last());
?>