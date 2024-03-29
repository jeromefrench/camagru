<?php

function goBack($fullDomain){
	if(isset($_SERVER['HTTP_REFERER'])) {
    	$previous = $_SERVER['HTTP_REFERER'];
	}else{
		$previous = $fullDomain;
	}
	header('Location: '.$previous);
	exit;
}

function handleError($message){
	$_SESSION['answer']['error_bdd'] = true;
	$_SESSION['answer']['message'] = $message;
	goBack($fullDomain);
}

function connection_bdd($root){
	require $root.'/config/database.php';
	try {
		$conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e) {
		handleError("Erreur de connexion a la bdd :".$e->getMessage());
	}
	return $conn;
}

//sign_in
//sign_up
function is_login_exist($conn, $login) {
	try {
		$stmt = $conn->prepare("SELECT id, login, mail, passwd FROM user");
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$data = $stmt->fetchAll();
		foreach ($data as $array)
		{
			if ($array['login'] === $login)
				return true;
		}
	}
	catch(PDOException $e) {
		handleError("Erreur dans is login exist :".$e->getMessage());
	}
	return false;
}

//confirmation_user
function add_new_user($conn, $user){ 
	try {
		$sql = "INSERT INTO user (login, mail, passwd, notif)
			VALUES ('{$user['login']}', '{$user['mail']}', '{$user['passwd']}', '1')";
		$conn->exec($sql);
	}
	catch(PDOException $e) {
		handleError("Erreur dans is login exist :".$e->getMessage());
	}
}

//sign_in
function is_login_and_password_match($conn, $login, $passwd) {
	try {
		$stmt = $conn->prepare("SELECT id, login, mail, passwd FROM user"); 
		$stmt->execute();
		$data = $stmt->fetchAll();
		foreach ($data as $array)
		{
			if ($array['passwd'] === $passwd)
				return true;
		}
	}
	catch(PDOException $e) {
		handleError("Erreur dans is login and passwd match :".$e->getMessage());
	}
	return false;
}

//my_galery
//galery_photo
//image
function get_user_id($conn, $login) {
	try {
		$stmt = $conn->prepare("SELECT * FROM `user` WHERE `login` LIKE '".$login."'"); 
		$stmt->execute();
		$data = $stmt->fetchAll();
		foreach ($data as $array) {
			return $array['id'];
		}
	}
	catch(PDOException $e) {
		handleError("Erreur dans get user id :".$e->getMessage());
	}
	return false;
}


//my_account
function get_mail_user($conn, $login) {
	try {
		$stmt = $conn->prepare("SELECT `mail` FROM `user` WHERE `login` = '".$login."'");
		$stmt->execute();
		$data = $stmt->fetchAll();
		foreach ($data as $array) {
			return $array['mail'];
		}
	}
	catch(PDOException $e) {
		handleError("Erreur dans get mail user :".$e->getMessage());
	}
	return false;
}



//galery
function get_nbr_of_photo($conn) {
	try {
		$stmt = $conn->prepare("SELECT count(*) FROM `photos`"); 
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data[0][0];
	}
	catch(PDOException $e) {
		handleError("Erreur dans get_nbr_of_photo :".$e->getMessage());
	}
	return false;
}

//galery
function get_photo_for_page($conn, $first, $nbr_per_page) {
	try {
		$stmt = $conn->prepare("SELECT * FROM `photos` ORDER BY id DESC LIMIT ".$first.",  ".$nbr_per_page."");
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;
	}
	catch(PDOException $e) {
		handleError("Erreur dans get photo for page :".$e->getMessage());
	}
	return false;
}

//galery_photo
function get_photo_with_id($conn, $id) {
	try {
		$stmt = $conn->prepare("SELECT * FROM `photos` WHERE `id` = ".$id." "); 
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data[0];
	}
	catch(PDOException $e) {
		handleError("Erreur dans get photo with id :".$e->getMessage());
	}
	return false;
}

//galery_photo
function add_comment($conn, $commentaire, $id_user, $id_photo) {
	try {
		$sql = "INSERT INTO `commentaires` (`id`, `commentaire`, `time_stamp`, `id_user`, `id_photo`) VALUES (NULL, '".$commentaire."',  '2019-11-09', '".$id_user."'  , '".$id_photo."'  );";
		$conn->exec($sql);
	}
	catch(PDOException $e) {
		handleError("Erreur dans add comment :".$e->getMessage());
	}
}

//galery_photo
function add_like($conn, $id_user, $id_photo) {
	try {
		$sql = "INSERT INTO `like_it` (`id`, `id_user`, `id_photo`) VALUES (NULL, '".$id_user."'  , '".$id_photo."'  );";
		$conn->exec($sql);
	}
	catch(PDOException $e) {
		handleError("Erreur dans add like :".$e->getMessage());
	}

}

//galery_photo
function get_number_of_like($conn, $id_photo){
	try {
		$stmt = $conn->prepare("SELECT count(*) FROM `like_it` WHERE `id_photo` = ".$id_photo.""); 
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data[0][0];
	}
	catch(PDOException $e) {
		handleError("Erreur dans get number of like :".$e->getMessage());
	}
	return false;
}

//galery_photo
function get_the_commentaires($conn, $id_photo){
	try {
		$stmt = $conn->prepare("SELECT * FROM `commentaires` WHERE `id_photo` = ".$id_photo." "); 
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;
	}
	catch(PDOException $e) {
		handleError("Erreur dans get the commentaire :".$e->getMessage());
	}
	return false;
}


//my_galery
function get_nbr_photo_for_the_user($conn, $id_user) {
	try {
		$stmt = $conn->prepare("SELECT count(*) FROM `photos` WHERE `id_user` = ".$id_user." ");
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data[0][0];
	}
	catch(PDOException $e) {
		handleError("Erreur dans get nbr photo for the user :".$e->getMessage());
	}
	return false;
}

//my_galery
function get_photo_for_page_for_user($conn, $first, $nbr_per_page, $id_user) {
	try {
		$stmt = $conn->prepare("SELECT * FROM `photos` WHERE `id_user` = ".$id_user." ORDER BY id DESC LIMIT ".$first.",  ".$nbr_per_page."");
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;
	}
	catch(PDOException $e) {
		handleError("Erreur dans get photo for page for user :".$e->getMessage());
	}
	return false;
}

//my_account
function update_login($conn, $login, $new_login) {
	try{
		$sql = "UPDATE `user` SET `login`='".$new_login."' WHERE `login` LIKE '".$login."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}
	catch(PDOException $e) {
		handleError("Erreur dans get notification :".$e->getMessage());
	}
}

//my_account
function update_notification($conn, $login, $notif) {
	try{
		$sql = "UPDATE `user` SET `notif`='".$notif."' WHERE `login` LIKE '".$login."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		//echo $stmt->rowCount() . " records UPDATED successfully";
	}
	catch(PDOException $e) {
		handleError("Erreur dans update notification :".$e->getMessage());
	}
}

//my_account
function update_mail($conn, $login, $new_mail) {
	try {
		$sql = "UPDATE `user` SET `mail`='".$new_mail."' WHERE `login` LIKE '".$login."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}
	catch(PDOException $e) {
		handleError("Erreur dans update mail :".$e->getMessage());
	}
}


//confirmation_user
function get_user_confirmation($conn, $numero_unique) {
	try {
		$stmt = $conn->prepare("SELECT * FROM `user_confirmation` WHERE `numero_unique` = ".$numero_unique." ");
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;
	}
	catch(PDOException $e) {
		handleError("Erreur dans user confirmation :".$e->getMessage());
	}
	return false;
}

//sign_up
function add_new_user_confirmation($conn, $user){
	try {
		$sql = "INSERT INTO `user_confirmation` (numero_unique, login, mail, passwd)
			VALUES ('{$user['numero_unique']}','{$user['login']}', '{$user['mail']}', '{$user['passwd']}')";
		// use exec() because no results are returned
		$conn->exec($sql);
		//echo "New record created successfully";
	}
	catch(PDOException $e) {
		handleError("Erreur dans add new user confirmation :".$e->getMessage());
	}
}

//new_password_request
function is_login_and_mail_match($conn, $login, $mail) {
	try {
		$stmt = $conn->prepare("SELECT * FROM `user` WHERE `login` LIKE '".$login."' ");
		$stmt->execute();
		$data = $stmt->fetchAll();
		if (isset($data[0]))
		{
			$data = $data[0];
			if ($data['mail'] === $mail)
				return true;
		}
		return false;
	}
	catch(PDOException $e) {
		handleError("Erreur dans is login and mail match :".$e->getMessage());
	}
	return false;
}

//changement_password
function is_numero_and_login_match_new_passwd($conn, $login, $numero) {
	$sql = "SELECT * FROM `new_password` WHERE `login` LIKE '".$login."' ORDER BY id DESC ";
	//echo $sql;
	try {
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$data = $stmt->fetchAll();
		if (isset($data[0])) {
			$data = $data[0];
			if ($data['numero'] == $numero)
				return true;
		}
		return false;
	}
	catch(PDOException $e) {
		handleError("Erreur dans is numero and login match new passwd :".$e->getMessage());
	}
	return false;
}

//my_account
//changement_password
function update_passwd($conn, $login, $new_passwd1) {
	try
	{
		$sql = "UPDATE `user` SET `passwd`='".$new_passwd1."' WHERE `login` LIKE '".$login."'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
	}
	catch(PDOException $e) {
		handleError("Erreur dans update passwd :".$e->getMessage());
	}
}


//my_account
//galery_photo
function get_notification($conn, $login) {
	try {
		$stmt = $conn->prepare("SELECT `notif` FROM `user` WHERE `login` = '".$login."'");
		$stmt->execute();
		$data = $stmt->fetchAll();
		foreach ($data as $array) {
			return $array['notif'];
		}
	}
	catch(PDOException $e) {
		handleError("Erreur dans get notification :".$e->getMessage());
	}
	return false;
}

//galery_photo
function sup_photo($conn, $id_photo) {
	try{
		$sql = "DELETE FROM photos WHERE id=".$id_photo."";
		$conn->exec($sql);
	}
	catch(PDOException $e) {
		handleError("Erreur dans sup photo :".$e->getMessage());
	}
}

//vue  galery_photo
function get_login_user($conn, $user_id) {
	try {
		$stmt = $conn->prepare("SELECT `login` FROM `user` WHERE `id` = '".$user_id."'");
		$stmt->execute();
		$data = $stmt->fetchAll();
		foreach ($data as $array) {
			return $array['login'];
		}
	}
	catch(PDOException $e) {
		handleError("Erreur get login user :".$e->getMessage());
	}
	return false;
}

//image.php
function insert_picture($conn, $name, $time, $id_user) {
	try {
		$sql = "INSERT INTO `photos` (`id`, `name`, `time`, `id_user`) VALUES (NULL, '".$name."', '2019-11-09', '".$id_user."');";
		$conn->exec($sql);
	}
	catch(PDOException $e) {
		handleError("Erreur dans insert picture :".$e->getMessage());
	}
}

//a changer send mail new password
function add_new_password($conn, $login, $numero){ 
	try {
		$sql = "INSERT INTO `new_password` (login, numero)
			VALUES ('".$login."','".$numero."')";
		$conn->exec($sql);
	}
	catch(PDOException $e) {
		handleError("Erreur add new passwd :".$e->getMessage());
	}
}


?>
