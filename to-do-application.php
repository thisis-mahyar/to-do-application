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

    <div class="modal">
        <div class="update-form-background"></div>
        <form class="update-form" action="to-do-application.php" method="POST">
            <h2>Add your task</h2>
            <br>
            <label for="update-name">Name</label>
            <input type="text" name="update-name" required>
            <br>
            <label for="update-description">Description</label>
            <input type="text" name="update-description" required>
            <br>
            <input id='update-id' name="update-id" type="hidden" />
            <input class="modal-add" type="submit" name="add" value="Add">
            <a href=# class="modal-cancel">Cancel</a>
        </form>

        <?php
        if (!empty($_POST['update-name']) && !empty($_POST['update-description']) && !empty($_POST['update-id']))
            update($_POST['update-name'], $_POST['update-description'], $_POST['update-id'])
        ?>
    </div>

    <?php
    if (!empty($_POST["name"]))
        create($_POST["name"], $_POST["description"])
    ?>

    <script src="scripts.js"></script>

</body>

</html>