<?php
session_start();
require "config.php";
$id = $_GET['id'];
$request = "DELETE FROM tasklist WHERE id = ?";
$result = $pdo->prepare($request);
$result->execute([$id]);
header("Location: index.php");
