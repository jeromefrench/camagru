<?php
session_start();
$_SESSION['logon'] = false;
header('Location: https://37.187.109.62/home');
?>
