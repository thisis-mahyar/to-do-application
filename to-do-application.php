<?php
include "crud.php"
?>

<!DOCTYPE html>

<html>

<head>
    <title>To-Do Application</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <h1>To-Do Application</h1>

    <?php read() ?>

    <form action="to-do-application.php" method="POST">
        <a>Add your task</a>
        <br>
        <label for="name">Name</label>
        <input type="text" name="name" required>
        <label for="description">Description</label>
        <input type="text" name="description">
        <br>
        <input type="submit" name="add" value="Add">
    </form>

    <?php
    if (!empty($_POST["name"]))
        create($_POST["name"], $_POST["description"])
    ?>
</body>

</html>