
<?php
$corp = "une de vos photos a recue un nouveau commentaire";
$conn = connection_bdd();
ini_set('display_errors', 1);
error_reporting(-1);
$mail = get_mail_user($conn, $login);
$mail = "jerome.chardin@live.fr";
/* echo mail (''.$mail.'', 'Email nouveau commentaire', ''.$corp.'') || print_r(error_get_last()); */
echo "helloAAA";
echo exec("/Users/jchardin/camagru/app/script.php");
echo "AAAhello";
?>
