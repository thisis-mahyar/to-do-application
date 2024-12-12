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

    <script>
        const f = function(e) {
            const id = e.currentTarget.id.split('-')[1];

            document.querySelector('#update-id').value = id

            document.querySelector('.modal').style.display = 'grid';

            // if you click the background, the modal window disappears
            document.querySelector('.update-form-background').addEventListener('click', function() {
                document.querySelector('.modal').style.display = 'none';
            })

            // if you click the cancel button, the modal window disappears
            document.querySelector('.modal-cancel').addEventListener('click', function() {
                document.querySelector('.modal').style.display = 'none';
            })

        }

        const elements = document.querySelectorAll(".update")

        for (let i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', f)
        }
    </script>
</body>

</html>