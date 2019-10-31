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
    	echo "Connected successfully"; 
    }
	catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }
	return $conn;
}

function is_login_exist($conn, $login)
{
	echo "<table style='border: solid 1px black;'>";
	echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

	class TableRows extends RecursiveIteratorIterator { 
    	function __construct($it) { 
        	parent::__construct($it, self::LEAVES_ONLY); 
    	}

    	function current() {
        	return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    	}

    	function beginChildren() { 
        	echo "<tr>"; 
    	} 

    	function endChildren() { 
        	echo "</tr>" . "\n";
    	} 
	} 

	try {
    	$stmt = $conn->prepare("SELECT id, login, mail, passwd FROM user"); 
    	$stmt->execute();
    	// set the resulting array to associative
    	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    	/* foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { */ 
		$data = $stmt->fetchAll();

		/* var_dump($data); */
		foreach ($data as $array)
		{
			echo $array['login']."</br>";
			if ($array['login'] === $login)
				return true;
		}
	}
	catch(PDOException $e) {
    	echo "Error: " . $e->getMessage();
	}
	echo "</table>";
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
    echo $sql . "<br>" . $e->getMessage();
    }
}


?>
