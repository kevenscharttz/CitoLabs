<?php 
    session_name("minha-sessão");
    session_set_cookie_params(240);
session_start();

unset($_SESSION['nickname']);
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
    <h2>Valor de apelido foi removido da sessão</h2>
</body>
</html>