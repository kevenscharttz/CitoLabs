<?php 

require_once("./connection.php");

$id = $_GET['id'];
$sql = 'DELETE FROM videos WHERE id = :id';

$statement = $pdo->prepare($sql);
$statement->bindValue(":id", $id);

if ($statement->execute() === false) {
    header('Location: ./index.php?sucesso=0');
} else {
    header('Location: ./index.php?sucesso=1');
}
?>