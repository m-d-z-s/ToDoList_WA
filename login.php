<?php
session_start();

if ($_SESSION != null){
    header("Location: index.php");
}
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/fontawesome.css" rel="stylesheet">
    <link href="css/brands.css" rel="stylesheet">
    <link href="css/solid.css" rel="stylesheet">

    <title>Login</title>
</head>
<body>
<h1>Login</h1>

<p>Fill in your credentials to login</p>
<form method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input name="login" type="text" class="form-control" id="username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password">
    </div>
    <button name="signIn" type="submit" class="btn btn-primary">Login</button>
</form>
<p>Dont have an account? <a href="signUp.php">Sign up now</a> </p>
</body>
</html>
<?php
//require "config.php";
$serverName = "localhost";
$dbName = "todolist_logins";
$userName = "root";
$password = "";
//создаем соединение с БД на сервере
$pdo = new PDO("mysql:host =$serverName;dbname=$dbName",$userName, $password);

if (isset($_POST["signIn"])){
    $login = $_POST["login"];
    $pwd = $_POST["password"];
    $request = "SELECT * FROM users WHERE login = ? AND password = ?";

    $result = $pdo->prepare($request);
    $result->execute([$login,$pwd]);

    if($row = $result->fetch()){
        session_start();
        $_SESSION['login'] = $row['login'];

        header("location: index.php");
    }
    else echo "error";
}
?>