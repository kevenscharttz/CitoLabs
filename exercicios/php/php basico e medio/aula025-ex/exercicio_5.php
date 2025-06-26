<?php 

    /* Uma empresa tem várias lojas, cada uma com um endereço de email.
    A variável $cidade indica que dados de email deverão ser apresentados.
    Constrói a lógica condicional e de apresentação do email correspondente quando é alterado o valor da cidade escolhida */

    $lojas = [
        'lisboa' => 'lisboa@gmail.com',
        'porto' => 'porto@gmail.com',
        'braga' => 'braga@gmail.com',
        'coimbra' => 'coimbra@gmail.com',
        'aveiro' => 'aveiro@gmail.com'
    ];
    
    $cidade = 'braga';
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exercício 5</title>
    </head>
    <body>
        <?php 
            if (array_key_exists($cidade, $lojas)): ?>
                <h3><?= $cidade?></h3>
                <p><?= $lojas[$cidade]?></p>
            <?php else: ?>
                <p>Não existe nehuma loja na cidade indicada</p>
            <?php endif; ?>
    </body>
</html>