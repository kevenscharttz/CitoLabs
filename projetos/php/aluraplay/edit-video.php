<?php
require "./connection.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, 'title');
if ($title === false || $title === null || $url === false || $url === null || $id === false || $id === null){
    header("Location: ./?sucesso=0");
    exit;
}

$sql = "UPDATE videos SET url = :url, title = :title WHERE id = :id";
$statement = $pdo->prepare($sql);

$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->bindValue(':url', $url);
$statement->bindValue(':title', $title);

try {
    $statement->execute();
    header("Location: ./?sucesso=1");
} catch (PDOException) {
    header("Location: ./
    ?sucesso=0");
}

