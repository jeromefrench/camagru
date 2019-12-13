<?php

function notification($text){

?>
	<script> notification("<?= $text; ?>"); </script>
<?php
}

if (isset($answer) && isset($answer['login_dont_exit'])){
	notification("Le login n'existe pas");
}
else if (isset($answer) && isset($answer['login_and_passwd_doesnt_match'])){
	notification("Le login et le mot de passe ne corresponde pas");
}
else if (isset($answer) && isset($answer['connexion_sucessfull'])){
	notification("Connexion reussi");
}
else if (isset($answer) && isset($answer['log_out_sucessfull'])){
	notification("Deconnexion reussi");
}
else if (isset($answer) && isset($answer['restricted'])){
	notification("Cette partie est reserve au utilisateur connecte");
}
else if (isset($answer) && isset($answer['information_missing'])){
	notification("Une information est manquante");
}
else if (isset($answer) && isset($answer['login_already_taken'])){
	notification("Ce login existe deja, veuillez en prendre un autre");
}
else if (isset($answer) && isset($answer['confirm_email'])){
	notification("Un email de confirmation viens de vous etre envoyer");
}
else if (isset($answer) && isset($answer['two_passwd_different'])){
	notification("Erreur : Les deux mots de passes sont different");
}
else if (isset($answer) && isset($answer['false_link'])){
	notification("Erreur : Votre lien n'est pas valid");
}
else if (isset($answer) && isset($answer['passwd_change'])){
	notification("Votre mot de passe a ete changer");
}
else if (isset($answer) && isset($answer['send_link'])){
	notification("Un lien permetant de modifier votre mot de passe vient de vous etre envoyer sur votre adresse mail");
}
else if (isset($answer) && isset($answer['wrong'])){
	notification("Erreur : information manquante dans le post");
}
else if (isset($answer) && isset($answer['login_and_mail_dont_match'])){
	notification("Login ou adresse mail erroner");
}
else if (isset($answer) && isset($answer['new_mail'])){
	notification("L'adresse mail a ete changer");
}
else if (isset($answer) && isset($answer['new_login'])){
	notification("Le login a ete changer");
}
else if (isset($answer) && isset($answer['update_notif'])){
	notification("Notification changer");
}
else if (isset($answer) && isset($answer['new_comment'])){
	notification("Votre commentaire a bien ete ajouter");
}
else if (isset($answer) && isset($answer['new_like'])){
	notification("Votre like a bien ete ajoute");
}
else if (isset($answer) && isset($answer['del_pic'])){
	notification("La photo a bien ete supprimmer");
}
?>
