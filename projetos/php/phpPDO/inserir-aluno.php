<?php

    use Alura\Pdo\Domain\Model\Student;

    require_once 'vendor/autoload.php';

    $dbPath = __DIR__ . "/banco.sqlite";
    $pdo = new PDO ("sqlite:$dbPath");

    $student = new Student(null, "Keven Willias", new \DateTimeImmutable('20-04-2004'));

    $sqlInsert = $pdo->exec("INSERT INTO students (nome, birth_date) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}')");

    echo "quantidade de usuarios cadastrados: " . var_dump($sqlInsert);
?>