<?php
$corp = "une de vos photos a recue un nouveau commentaire";
$conn = connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME);
ini_set('display_errors', 1);
error_reporting(-1);
$mail = get_mail_user($conn, $login);
/* echo mail (''.$mail.'', 'Email nouveau commentaire', ''.$corp.'') || print_r(error_get_last()); */
echo exec("/Users/jchardin/camagru/app/script.php");
?>
