<?php

require "./connection.php";

$url = $_POST['url'];
$title = $_POST['titulo'];

$sql = "INSERT INTO videos (url, title) VALUES (?, ?)";

$statement = $pdo->prepare($sql);

$statement->bindValue(1, $url);
$statement->bindValue(2, $title);

$statement->execute();

header("Location: ./index.php");
