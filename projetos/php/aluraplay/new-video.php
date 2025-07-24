<?php

require_once "./connection.php";

$title = $_POST['title'];
$url = $_POST['url'];

$sql = "INSERT INTO videos (url, title) VALUES (:url, :title)";

$statement = $pdo->prepare($sql);
$statement->bindValue(":url", $url);
$statement->bindValue(":title", $title);


if ($statement->execute() === false) {
    header('Location: ./index.php?sucesso=0');
    exit;
} else {
    header('Location: ./index.php?sucesso=1');
    exit;
}
