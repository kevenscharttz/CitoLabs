<?php 
    //remover cookie
    $nome = 'meu_cookie';
    setcookie($nome, '', time() - 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once('nav.php')?>
</body>
</html>