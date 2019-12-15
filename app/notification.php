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
	notification("Le login et le mot de passe ne correspondent pas");
}
else if (isset($answer) && isset($answer['connexion_sucessfull'])){
	notification("Connexion réussie");
}
else if (isset($answer) && isset($answer['log_out_sucessfull'])){
	notification("Déconnexion réussie");
}
else if (isset($answer) && isset($answer['restricted'])){
	notification("Cette partie est réservée aux utilisateurs connectés");
}
else if (isset($answer) && isset($answer['information_missing'])){
	notification("Une information est manquante");
}
else if (isset($answer) && isset($answer['login_already_taken'])){
	notification("Ce login existe déjà, veuillez en prendre un autre");
}
else if (isset($answer) && isset($answer['confirm_email'])){
	notification("Un email de confirmation vient de vous être envoyé");
}
else if (isset($answer) && isset($answer['two_passwd_different'])){
	notification("Erreur : Les deux mots de passe sont différents");
}
else if (isset($answer) && isset($answer['false_link'])){
	notification("Erreur : votre lien n'est pas valide");
}
else if (isset($answer) && isset($answer['passwd_change'])){
	notification("Votre mot de passe a été changé");
}
else if (isset($answer) && isset($answer['send_link'])){
	notification("Un lien permettant de modifier votre mot de passe vient de vous être envoyé sur votre adresse mail");
}
else if (isset($answer) && isset($answer['wrong'])){
	notification("Erreur : information manquante dans le post");
}
else if (isset($answer) && isset($answer['login_and_mail_dont_match'])){
	notification("Login ou adresse mail erroné(e)");
}
else if (isset($answer) && isset($answer['new_mail'])){
	notification("L'adresse mail a été changée");
}
else if (isset($answer) && isset($answer['new_login'])){
	notification("Le login a été changé");
}
else if (isset($answer) && isset($answer['update_notif'])){
	notification("Notification changée");
}
else if (isset($answer) && isset($answer['new_comment'])){
	notification("Votre commentaire a bien été ajouté");
}
else if (isset($answer) && isset($answer['new_like'])){
	notification("Votre like a bien été ajouté");
}
else if (isset($answer) && isset($answer['del_pic'])){
	notification("La photo a bien été supprimée");
}
else if (isset($answer) && isset($answer['passwdWeak'])){
	notification($answer['message']);
}
else if (isset($answer) && isset($answer['error_bdd'])){
	notification($answer['message']);
}
else if (isset($answer) && isset($answer['id_invalid'])){
	notification("id invalid");
}
?>
