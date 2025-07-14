<?php

require "./connection.php";

$url = $_POST['url'];
$title = $_POST['titulo'];

$sql = "INSERT INTO videos (url, title) VALUES (?, ?)";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $url);
$statement->bindValue(2, $title);

if ($statement->execute() === false) {
    header("Location: ./index.php?successo=0");
} else {
    header("Location: ./index.php?sucesso=1");
}
