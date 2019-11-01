<?php
function connection_bdd()
{
	$servername = "localhost";
	$username = "root";
	$password = "rootpasswd";
	$dbname = "camagru";

	try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	// set the PDO error mode to exception
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	/* echo "Connected successfully"; */
    }
	catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
     }
	return $conn;
}

function is_login_exist($conn, $login)
{

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
		echo "hellow2";
    	echo "Error: " . $e->getMessage();
	}
	return false;
}

function add_new_user($conn, $user){

try {
    $sql = "INSERT INTO user (login, mail, passwd)
    VALUES ('{$user['login']}', '{$user['mail']}', '{$user['passwd']}')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
		echo "hello2";
    echo $sql . "<br>" . $e->getMessage();
    }
}


function is_login_and_password_match($conn, $login, $passwd)
{
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
		echo "hello";
    	echo "Error: " . $e->getMessage();
	}
	return false;
}

function get_user_id($conn, $login)
{
	try {
    	$stmt = $conn->prepare("SELECT * FROM `user` WHERE `login` LIKE '".$login."'"); 
    	$stmt->execute();
		$data = $stmt->fetchAll();
		foreach ($data as $array)
		{
			return $array['id'];
		}
	}
	catch(PDOException $e) {
    	echo "Error: " . $e->getMessage();
	}
	return false;
}


function insert_picture($conn, $name, $time, $id_user)
{
	try {
    	$sql = "INSERT INTO `photos` (`id`, `name`, `time`, `id_user`) VALUES (NULL, '".$name."', '2019-11-09', '".$id_user."');";

    	// use exec() because no results are returned
    	$conn->exec($sql);
    	echo "New record created successfully";
    }
	catch(PDOException $e)
    {
		echo "hello2";
    	echo $sql . "<br>" . $e->getMessage();
    }
}

function get_photo($conn)
{
	try {
    	$stmt = $conn->prepare("SELECT * FROM `photos`"); 
    	$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;
	}
	catch(PDOException $e) {
    	echo "Error: " . $e->getMessage();
	}
	return false;
}

?>
