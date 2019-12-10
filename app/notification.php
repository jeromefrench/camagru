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
?>
