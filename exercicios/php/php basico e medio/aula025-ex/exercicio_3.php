<?php 

    /* Ordernar a lista em ordem alfabética e
    apresenta-lá em um lista não ordenada */

    $produtos = ['arroz', 'batata', 'laranja', 'maçã', 'pêra', 'uva', 'banana', 'abacaxi', 'manga', 'kiwi', 'cabelinho de milho', 'cenoura', 'beterraba', 'batata doce', 'mandioca', 'abóbora', 'berinjela', 'pimentão', 'pepino', 'tomate', 'repolho', 'brócolis', 'couves', 'espinafre', 'alface', 'rúcula'];

    sort($produtos);
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