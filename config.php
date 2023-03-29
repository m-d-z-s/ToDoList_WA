<?php
$serverName = "localhost";
$dbName = "todolist_logins";
$userName = "root";
$password = "";
//создаем соединение с БД на сервере
$pdo = new PDO("mysql:host =$serverName;dbname=$dbName",$userName, $password);

?>
