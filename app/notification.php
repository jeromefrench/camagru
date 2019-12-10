<?php

function notification($text){

?>
	<script> notification("<?= $text; ?>"); </script>
<?php
}

if (isset($answer) && isset($answer['login_dont_exit'])){
	notification("Le login n'existe pas");
}
if (isset($answer) && isset($answer['login_and_passwd_doesnt_match'])){
	notification("Le login et le mot de passe ne corresponde pas");
}
if (isset($answer) && isset($answer['connexion_sucessfull'])){
	notification("Connexion reussi");
}
if (isset($answer) && isset($answer['log_out_sucessfull'])){
	notification("Decoonnexion reussi");
}
if (isset($answer) && isset($answer['restricted'])){
	notification("Cette partie est reserve au utilisateur connecte");
}
if (isset($answer) && isset($answer['information_missing'])){
	notification("Une information est manquante");
}
if (isset($answer) && isset($answer['login_already_taken'])){
	notification("Ce login existe deja, veuillez en prendre un autre");
}
if (isset($answer) && isset($answer['confirm_email'])){
	notification("Un email de confirmation viens de vous etre envoyer");
}
if (isset($answer) && isset($answer['two_passwd_different'])){
	notification("Erreur : Les deux mots de passes sont different");
}
if (isset($answer) && isset($answer['false_link'])){
	notification("Erreur : Votre lien n'est pas valid");
}
if (isset($answer) && isset($answer['passwd_change'])){
	notification("Votre mot de passe a ete changer");
}
?>
