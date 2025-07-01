<?php 

    require_once 'vendor/autoload.php';

    $dbPath = __DIR__ . "/banco.sqlite";
    $pdo = new PDO ("sqlite:$dbPath");
    $statement = $pdo->query("SELECT * FROM students;");
    $studentList = var_dump($statement->fetchAll());

?>