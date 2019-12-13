<?php
$numero = rand(0, 1000000);
<<<<<<< HEAD
$domain_name = $fullDomain;
=======
/* $domain_name = "https://localhost:8443"; */
$domain_name = "http://localhost:8080";
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
$page = "confirmation";
$corp = $domain_name."/".$page."/".$login."/".$numero;

ini_set('display_errors', 1);
error_reporting(-1);
mail (''.$mail.'', 'Email de confirmation', ''.$corp.'') || print_r(error_get_last());

<<<<<<< HEAD
=======
//rajouter dans la bdd use rconfirmation
>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
?>
