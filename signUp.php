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

    <title>Sign up</title>
</head>
<body>
<h1>Sign up</h1>

<p>Fill this form to create an account</p>
<form method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input name="login" class="form-control" id="username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="mb-3">
        <label for="password1" class="form-label">Confirm password</label>
        <input type="password" name="confirmPassword" class="form-control" id="password1">
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    <button name="reset" type="reset" class="btn btn-primary">Reset</button>
</form>
<p>Already have an account? <a href="login.php">Login here</a> </p>
</body>
</html>
<?php
require 'config.php';
if (isset($_POST['submit'])){
    //получаем данные с полей
    $login = $_POST["login"];
    $pwd = $_POST["password"];
    //создаем запрос на добавление записи в базу данных
    $request = "INSERT INTO users(login, password) VALUES (?,?)";
    if ($_POST["password"] == $_POST["confirmPassword"]){
        //отправляем запрос в базу данных
        $result = $pdo->prepare($request);
        $result->execute([$login,$pwd]);

        if ($result) echo "Success";
        else echo "Error";
    }
    else echo "Password dont match";
}
?>