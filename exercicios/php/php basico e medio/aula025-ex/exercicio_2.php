<?php 

    /* Usando como ponto de partida um array de produtos
    inverta a ordem desse array e acrescente ao final
    o produto "maça" e "pêra". Depois apresente a lista
    em uma lista não ordenada em HTML */

    $produtos = ['arroz', 'batata', 'laranja'];
    $produtos = array_reverse($produtos);
    array_push($produtos, 'maçã', 'pêra');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exercício 1</title>
    </head>
    <body>
        <ul>
            <?php 
                for ($i = 0; $i < count($produtos); $i++) {
                    echo "<li>$produtos[$i]</li>";
                }
            ?>
        </ul>
    </body>
</html>