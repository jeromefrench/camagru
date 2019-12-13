<<<<<<< HEAD

<?php
ini_set('display_errors', 1);
error_reporting(-1);
$mail = get_mail_user($conn, $login);
$corp = "une de vos photos a recue un nouveau commentaire";
mail (''.$mail.'', 'Nouveau commentaire', ''.$corp.'') || print_r(error_get_last());
=======
<?php
$corp = "une de vos photos a recue un nouveau commentaire";
ini_set('display_errors', 1);
error_reporting(-1);
$mail = get_mail_user($conn, $login);
mail (''.$mail.'', 'Email nouveau commentaire', ''.$corp.'') || print_r(error_get_last());

>>>>>>> b570eaf573cc3e666887995724ba8589d0b18e94
?>
