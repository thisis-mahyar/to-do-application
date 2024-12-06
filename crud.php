<?php
function create($name)
{
    $con = new PDO("mysql:hostname=localhost;dbname=to_do_app", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["text"])) {

            $stmt = $con->prepare("
            INSERT INTO tasks
            VALUES (:name)
            ");

            $stmt->bindParam(":name", $name);

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
            SELECT *
            FROM tasks
        ");

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();

        foreach ($data as $d) {
            echo $d["name"] . "<br>";
        }

        $con = null;
    } catch (PDOException $e) {
        $e->getMessage();
    }
}
