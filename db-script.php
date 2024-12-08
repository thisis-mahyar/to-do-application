<?php
$con = new PDO("mysql:host=localhost;dbname=to_do_app", "root", "");
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $con->exec("
        CREATE TABLE IF NOT EXISTS tasks
        (
            id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            status_id INT,
        );

        CREATE TABLE IF NOT EXISTS status
        (
            status_id INT,
            status_name VARCHAR(32)
        );

        INSERT INTO status VALUES
        (1, 'TO DO'),
        (2, 'IN PROGRESS'),
        (3, 'DONE')
    ");
} catch(PDOException $e) {
    echo $e->getMessage();
}