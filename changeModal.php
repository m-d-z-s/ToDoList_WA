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
    <div class="mb-3">
    <select name="newState"  class="form-select" aria-label="Default select example">
                            <option selected>select</option>
                            <option value="0">not done</option>
                            <option value="1">done</option>
    </select>

        <label for="username" class="form-label">new task</label>
        <input name="taskName" class="form-control">
    </div>
    <button type="submit" name="change" class="btn btn-outline-secondary">Change</a></button>
     <button type="submit" name="back" class="btn btn-outline-secondary">Back</button>

</form>
</body>
</html>
';
if (isset($_POST['change'])){
    session_start();
    require "config.php";

    $task = $_POST["taskName"];
    $state = $_POST["newState"];
    $id = $_GET["id"];
    echo $state;

    if ($state == "select"){
        $request = "UPDATE tasklist SET task=? WHERE id=?";

        $result = $pdo->prepare($request);
        $result->execute([$task, $id]);
    }
    elseif ($task == ""){
        $request = "UPDATE tasklist SET state=? WHERE id=?";

        $result = $pdo->prepare($request);
        $result->execute([$state, $id]);
    }
    else{
        $request = "UPDATE tasklist SET task=?, state=? WHERE id=?";

        $result = $pdo->prepare($request);
        $result->execute([$task, $state, $id]);

    }
    header("Location: index.php");

}

if (isset($_POST['back'])){
    header("Location: index.php");
    session_destroy();
}
?>
