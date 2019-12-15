#!/Users/jchardin/my_mamp/php/bin/php
<?php
require 'database.php';

$sql = file_get_contents("camagru.sql");
$tab_sql = explode(";", $sql);

	try {
		$conn = new PDO("mysql:host=$DB_DSN", $DB_USER, $DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		foreach($tab_sql as $statement){
			/* echo "-->".$statement."<--"; */
			if ($statement == "" || $statement == null || $statement == "\n"){
				;
			}
			else {
				$conn->exec($statement);
			}
		}
		echo "Done";
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}

$conn = null;

?>
