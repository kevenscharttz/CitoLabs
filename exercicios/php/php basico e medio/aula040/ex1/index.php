<?php 
    // Todos os scripts devem ter o início de sessão, antes de qualquer output do PHP

    session_start();

    //O valor de $nome e $apelido vai ser definido tendo em atenção a existência ou não das variáveis na super global $_SESSION

    $name = !empty($_SESSION['name']) ? $_SESSION['name'] : '-';
    
    $nickname = !empty($_SESSION['nickname']) ? $_SESSION['nickname'] : '-';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once 'nav.php'?>
    
    <hr>
    <h2>Exercício com sessões de PHP</h2>

    <h3>Valor da variável 'nome'</h3>
    <h1><?= $name?></h1>

    <h3>Valor da variável 'nome'</h3>
    <h1><?= $nickname?></h1>

</body>
</html>