<?php
$numero = rand(0, 1000000);
/* $domain_name = "https://localhost:8443"; */
$domain_name = "http://localhost:8080";
$page = "confirmation";
$corp = $domain_name."/".$page."/".$login."/".$numero;

ini_set('display_errors', 1);
error_reporting(-1);
mail (''.$mail.'', 'Email de confirmation', ''.$corp.'') || print_r(error_get_last());

//rajouter dans la bdd use rconfirmation
?>
