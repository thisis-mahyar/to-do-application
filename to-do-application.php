<?php
include "crud.php"
?>

<!DOCTYPE html>

<html>

<head>
    <title>To-Do Application</title>
    <style>
        * {
            font-family: "Times New Roman", Times, serif;
            font-size: 16px;
        }

        h1 {
            font-size: 24px;
        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            width: 200px;
            height: 25px;
            border: solid 1px;
            border-collapse: collapse;
            text-align: center;
        }

        a {
            text-decoration: none;
        }

        input {
            border: solid 1px black;
        }
    </style>
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