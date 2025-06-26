<?php 
session_start();

unset($_SESSION['name']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once ('nav.php')?>
    <hr>
    <h2>Valor de nome foi removido da sessão</h2>
</body>
</html>