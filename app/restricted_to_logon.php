
<?php
if (!isset($_SESSION['logon']) || $_SESSION['logon'] == false)
{
	echo "<h1>Please register before use</h1>";
	exit;
}
?>
