<?php
$numero = rand(0, 1000000);
$domain_name = $fullDomain;
$page = "confirmation";
$corp = $domain_name."/".$page."/".$login."/".$numero;

ini_set('display_errors', 1);
error_reporting(-1);
mail (''.$mail.'', 'Email de confirmation', ''.$corp.'') || print_r(error_get_last());

//rajouter dans la bdd use rconfirmation
?>
