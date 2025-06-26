<?php 
    /* Construir uma apresenação em HTML que mostra a tabuada do 5.
    */
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabuada</title>
    </head>
    <body>
        <h1>Tabuada do número 5</h1>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <p>5 x <?=$i." = ".($i*5); ?></p>
            <?php endfor; ?>
    </body>
</html>
