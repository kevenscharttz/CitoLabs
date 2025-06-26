<?php 
    // Dado o array, apresentar todos os nomes, exceto o indice 4.

    $nomes = ['joao', 'ana', 'carlos', 'marco', 'maria', 'silvia', 'helena', 'ricardo'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exercicio 3</title>
    </head>
    <body>
        <h1>Apresentação dos nomes</h1>
        <?php foreach ($nomes as $key => $nome): ?>
            <?php if($key == 4) continue;?>
            <p><?= $nome ?></p>
        <?php endforeach;?>
    </body>
</html>