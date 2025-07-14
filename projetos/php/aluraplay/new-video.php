<?php

require "./connection.php";

$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, 'title');
if ($title === false || $url === false){
    header("Location: ./index.php?sucesso=0");
}

$sql = "INSERT INTO videos (url, title) VALUES (?, ?)";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $url);
$statement->bindValue(2, $title);

try {
    $statement->execute();
    header("Location: ./index.php?sucesso=1");
} catch (PDOException) {
    header("Location: ./index.php?sucesso=0");
}
