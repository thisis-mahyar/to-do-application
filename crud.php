<?php
function create($name, $description)
{
    $con = new PDO("mysql:hostname=localhost;dbname=to_do_app", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["name"])) {

            $stmt = $con->prepare("
            INSERT INTO tasks (name, description, status_id)
            VALUES (:name, :description, 1)
            ");

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);

            $stmt->execute();

            // PRG Problem
            header("Location: to-do-application.php");
            exit;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function read()
{
    $con = new PDO("mysql:host=localhost;dbname=to_do_app", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmt = $con->prepare("
            SELECT id, name, description, status_name
            FROM tasks
            JOIN status
            WHERE tasks.status_id = status.status_id;
        ");

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();

        echo "<table>";

        echo "<tr> <th> ID </th> <th> Name </th> <th> Description </th> <th> Status </th> <th> Options </th> </tr>";

        foreach ($data as $d) {
            echo "<tr>";
            echo "<td>" . $d["id"] . "</td>";
            echo "<td>" . $d["name"] . "</td>";
            echo "<td>" . $d["description"] . "</td>";
            echo "<td>" . $d["status_name"] . "</td>";
            echo
            "<td> 
            <button id='update-{$d['id']}' class='update'>Update</button>
            <button id='delete-{$d['id']}' class='delete '>Delete</button>
            </td>";
            echo "</tr>";
        }

        echo "</table>";

        $con = null;
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function update($name, $description, $id)
{
    $con = new PDO("mysql:hostname=localhost;dbname=to_do_app", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($name) && !empty($description) && !empty($id)) {

            $stmt = $con->prepare("
            UPDATE tasks
            SET name = :name, description = :description
            WHERE id = :id
            ");

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);
            $stmt->bindParam(":id", $id);

            $stmt->execute();

            // PRG Problem
            header("Location: to-do-application.php");
            exit;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function delete($id)
{
    $con = new PDO("mysql:hostname=localhost;dbname=to_do_app", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($id)) {

            $stmt = $con->prepare("
                DELETE FROM tasks
                WHERE id = :id
            ");

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            // PRG Problem
            header("Location: to-do-application.php");
            exit;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
