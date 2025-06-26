<?php 
    $valor1 = 1;
    $valor2 = 1;
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <!-- while -->
        <?php while ($valor1 <= 10) : ?>
            <h3>Valor = <?= $valor1++?></h3>
        <?php endwhile; ?>
        <hr>

        <!-- do while -->
         <?php do {?>
            <h3><?= $valor2++?></h3>
        <?php } while ($valor2 <= 10)?>
    </body>
</html>