<?php
session_start();

if ($_SESSION == null) {
    header("Location: signUp.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="js/bootstrap.bundle.js" rel="stylesheet">
    <link href="css/fontawesome.css" rel="stylesheet">
    <link href="css/brands.css" rel="stylesheet">
    <link href="css/solid.css" rel="stylesheet">

    <title>Task List</title>
</head>
<body>
<a class="btn btn-primary" href="signUp.php" role="button">sign up</a>
<a class="btn btn-primary" href="login.php" role="button">login</a>
<a href="logout.php" class="btn btn-outline-secondary" name="signOut">Sign Out</a>
<form method="post">
    <button type="button" name="theme" class="btn btn-outline-warning"><i class="fa-solid fa-toggle-on"></i></button>
</form>
<div class="modal-footer">
    <form action="addTask.php" method="post">
        <input type="text" name="task">
        <input type="submit" class="btn btn-secondary">
    </form>
    </form>
</div>

<form method="post">
    <table class="table" role="menu">
        <thead>

        <tr>
            <th scope="col">State</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php
            require "config.php";
            $request = "SELECT id, task, state FROM tasklist WHERE login = ?";

            $result = $pdo->prepare($request);
            $result->execute([$_SESSION['login']]);

            foreach ($result as $row) {

                echo '<tr>
                        <td>';
                            if($row['state'] == 0) echo "not done";
                            else echo "done";
                  echo '</td> 
                        <td>
                            '. $row['task'] .'
                        </td>
                        <td>
                            <a href="changeModal.php?id=' . $row['id'] . '">
                                <button type="button" class="btn btn-outline-success"><i class="fa-solid fa-pen"></i></button>
                            </a>
                            <a href="delete.php?id=' . $row['id'] . '">
                                <button type="button" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></input>
                            </a>
                        </td>
                    </tr>';
            }
        ?>

        </tbody>
    </table>
</form>

</html>
<?php
if (isset($_SESSION['theme'])) {
    $theme = $_SESSION['theme'];
} else {
    $theme = 'light';
}

if (isset($_POST['theme'])) {
    echo 'hi';

    if ($theme == 'light') {
        $theme = 'dark';
    } else {
        $theme = 'light';
    }
    // Сохраняем новое значение в сессии
    $_SESSION['theme'] = $theme;
    echo "<link rel='stylesheet' type='text/css' href='$theme.css'>";

}

?>
