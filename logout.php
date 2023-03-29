<?php
session_start();

$_SESSION = array();

session_destroy();
header("Location: signUp.php");
?>
//добавить задачу
//model title
//