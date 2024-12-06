<?php
try {
    $con = new PDO("mysql:server=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $con->exec("CREATE DATABASE to_do_app");

    $con->exec("
        USE to_do_app;

        CREATE TABLE tasks (
            name VARCHAR(255) NOT NULL
        )
    ");
} catch (PDOException $e) {
    echo $e->getMessage();
}
