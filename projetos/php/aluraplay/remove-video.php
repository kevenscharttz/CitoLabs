<?php
require "./connection.php";

$id = $_GET['id'];
$sql = "DELETE FROM videos WHERE id = ?";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);

try {
    $statement->execute();
    header("Location: ./index.php?sucesso=1");
} catch (PDOException) {
    header("Location: ./index.php?sucesso=0");
}

