<?php
include_once '../app/bdd_functions.php';


$conn = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
$sql = file_get_contents("/Users/jchardin/camagru/config/camagru.sql");

$tab_sql = explode(";", $sql);
foreach($tab_sql as $statement)
{
	echo $statement."</br>";
	try {
    	$conn->exec($statement);
    	echo "New record created successfully";
    }
	catch(PDOException $e)
    {
    	echo $sql . "<br>" . $e->getMessage();
    }
}
?>
