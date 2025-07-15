<?php
require "./connection.php";

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null) {
    header("Location: /?sucesso=0");
}
$sql = "DELETE FROM videos WHERE id = ?";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);

try {
    $statement->execute();
    header("Location: /?sucesso=1");
} catch (PDOException) {
    header("Location: /?sucesso=0");
}

