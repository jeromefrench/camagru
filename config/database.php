<?php

include_once '../app/bdd_functions.php';


$DB_DSN = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "rootpasswd";
$DB_NAME = "camagru";

function connection_bdd($DB_DSN, $DB_USER, $DB_PASSWORD, $DB_NAME)
{

	try {
    	$conn = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
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


?>
