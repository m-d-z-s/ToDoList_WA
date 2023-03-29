<?php
echo '
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
</head>
<body>

<p>Fill this form to change task</p>
<form method="post">
<!--
    <div class="mb-3">
    <select name="newState" id="newState" class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="0">not done</option>
                            <option value="1">done</option>
    </select>
    <div>
        <button type="submit" name="changeState" class="btn btn-outline-secondary"><a href="index.php">Change state</a></button>
</div>
-->

        <label for="username" class="form-label">new task</label>
        <input name="taskName" class="form-control">
    </div>
    <button type="submit" name="change" class="btn btn-outline-secondary">Change</button>
<!--
     <button type="submit" name="back" class="btn btn-outline-secondary">Back</button>
-->

</form>
</body>
</html>
';
if (isset($_POST['change'])){
    session_start();
    require "config.php";

    $task = $_POST["taskName"];
    $id = $_GET["id"];
    $request = "UPDATE tasklist SET task=? WHERE id=?";

    $result = $pdo->prepare($request);
    $result->execute([$task, $id]);
    header("Location: index.php");

}
?>
