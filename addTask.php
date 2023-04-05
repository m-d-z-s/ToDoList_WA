<?php
session_start();
require "config.php";

$task = $_POST['task'];

$request = "INSERT INTO tasklist(task, login, state) VALUES (?,?,?)";

$result = $pdo->prepare($request);
$result->execute([$task, $_SESSION['login'], 0]);
session_destroy();
header('Location: index.php');
?>

