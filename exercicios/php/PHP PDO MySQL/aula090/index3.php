<?php
    // dados de ligação
    $database = 'udemy_loja_online';
    $username = 'user_loja_web';
    $password = '123456789Lu';

    // ligação
    $ligacao = new PDO("mysql:host=127.0.0.1;dbname=$database;charset=utf8", $username, $password);

    // carregar os dados (em formato de array de objetos)
    $resultados = $ligacao->query("SELECT * FROM frutas")->fetchAll(PDO::FETCH_OBJ);

    // fechar a ligação
    $ligacao = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Apresentação de dados de uma query SQL</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-5">

                <?php if(count($resultados) == 0):?>
                    
                    <p>Não foram encontrados dados.</p>

                <?php else: ?>

                    <?php foreach($resultados as $produto): ?>
                        <div class="card p-3 mb-2 bg-light text-center">
                            <h5><?= $produto->produto ?></h5>
                            <h3 class="text-primary"><?= $produto->preco_unidade ?> $</h5>
                        </div>
                    <?php endforeach; ?>
                    
                <?php endif; ?>

            </div>
        </div>
    </div>

</body>
</html>