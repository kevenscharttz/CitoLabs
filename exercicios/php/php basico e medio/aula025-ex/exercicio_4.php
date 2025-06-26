<?php 

    /* Construir uma lógica que permita
    apresentar apenas o parágrafo correspondente
    ao valor da variável $nome*/

    $nome = 'Ana';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exercício 1</title>
    </head>
    <body>
        <?php if ($nome === "João") :?>
            <p>O nome é João</p>
        
        <?php elseif ($nome === "Ana") :?>
            <p>O nome é Ana</p>
    
        <?php elseif ($nome === "Carlos") :?>
            <p>O nome é Carlos</p>
        
        <?php else :?>
            <p>É um nome desconhecido</p>

        <?php endif;?>
    </body>
</html>