<?php
include "crud.php"
?>

<!DOCTYPE html>

<html>

<head>
    <title>To-Do Application</title>
</head>

<body>
    <h1>To-Do Application</h1>

    <form action="to-do-application.php" method="POST">
        <label for="task">Add your task</label>
        <input type="text" name="text" required>
        <input type="submit" name="add" value="Add">
    </form>

    <?php read() ?>

    <?php
    if (!empty($_POST["text"]))
        create($_POST["text"])
    ?>

</body>

</html>