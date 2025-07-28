<?php

require_once __DIR__ . "/connection.php";

$id = $_GET['id'];
$sql = 'DELETE FROM videos WHERE id = ?';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);

$repository = new \Alura\Mvc\Repository\VideoRepository($pdo);

if ($repository->remove($id) === false) {
    header(header:'Location: /?sucesso=0');
} else {
    header(header:'Location: /?sucesso=1');
}
