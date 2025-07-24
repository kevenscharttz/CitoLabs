<?php

require_once "./connection.php";


$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);

if ('url' === false) {
    header('Location: /index.php?sucesso=0');
    exit;
}

$title = filter_input(INPUT_POST, 'title');

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
