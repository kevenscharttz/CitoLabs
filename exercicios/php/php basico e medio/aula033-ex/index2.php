<?php 
    /* 
    Construir um array com todos os resultados da tabuada do 327, depois apresentar os dados desse array em um ciclo foreach(apenas os valores)
    */

    $resultados = [];

    for ($i = 1; $i <= 10; $i++){
        array_push($resultados, (327 * $i));
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exercicio 2</title>
    </head>
    <body>
        <h1>Resultado da tabuada de 327</h1>
        <?php foreach($resultados as $resultado): ?>
           <p><?= $resultado ?></p> 

        <?php endforeach;?>
    </body>
</html>