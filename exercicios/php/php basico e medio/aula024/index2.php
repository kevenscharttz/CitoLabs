<?php 
    $valor = 10;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php if ($valor == 10) : ?>
            <p>O valor é igual a 10</p>
        <?php else : ?>
            <p>O valor não é igual a 10</p>
        <?php endif; ?>
        <br>
        <!-- Com o elseif -->

        <?php if ($valor > 100) : ?>
            <p>O valor é maior que 100</p>
        <?php elseif ($valor > 50) : ?>
            <p>O valor é maior que 50</p>
        <?php elseif ($valor > 10) : ?>
            <p>O valor é maior que 10</p>
        <?php else : ?>
            <p>O valor é menor ou igual a 10</p>
        <?php endif; ?>
        
    </body>
</html>