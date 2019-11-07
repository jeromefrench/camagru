<?php
session_start();
$_SESSION['logon'] = false;
header('Location: http://localhost:8080/home');
?>
